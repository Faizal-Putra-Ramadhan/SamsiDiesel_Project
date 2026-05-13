<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\ServiceHistory;
use App\Models\ServiceDetail;
use App\Models\Product;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'customers' => User::where('role', 'customer')->count(),
            'vehicles' => Vehicle::count(),
            'pending_complaints' => Complaint::where('status', 'pending')->count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }

    public function customers()
    {
        $customers = User::where('role', 'customer')->with('vehicles')->get();
        return view('admin.customers', compact('customers'));
    }

    public function services()
    {
        $vehicles = Vehicle::with('user')->get();
        $histories = ServiceHistory::with('vehicle.user')->latest()->get();
        return view('admin.services', compact('vehicles', 'histories'));
    }

    public function addServiceLog(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_whatsapp' => 'required|string',
            'plate_number' => 'required|string',
            'vehicle_brand' => 'required|string',
            'vehicle_model' => 'required|string',
            'services' => 'required|array|min:1',
            'services.*.name' => 'required|string',
            'services.*.price' => 'required|numeric',
            'service_date' => 'required|date',
            'next_service_date' => 'nullable|date',
            'spareparts' => 'nullable|string',
            'notes' => 'nullable|string',
            'technician_name' => 'nullable|string',
        ]);

        // Find or create user by whatsapp_number
        $user = User::firstOrCreate(
            ['whatsapp_number' => $request->customer_whatsapp],
            [
                'name' => $request->customer_name,
                'role' => 'customer',
                'password' => null, 
                'email' => null,   
            ]
        );

        // Find or create vehicle by plate_number
        $vehicle = Vehicle::firstOrCreate(
            ['plate_number' => $request->plate_number],
            [
                'user_id' => $user->id,
                'brand' => $request->vehicle_brand,
                'model' => $request->vehicle_model,
            ]
        );

        // Calculate total cost and summarize service type
        $totalCost = collect($request->services)->sum('price');
        $serviceTypeSummary = collect($request->services)->pluck('name')->implode(', ');

        $history = ServiceHistory::create([
            'vehicle_id' => $vehicle->id,
            'service_type' => $serviceTypeSummary,
            'service_date' => $request->service_date,
            'next_service_date' => $request->next_service_date,
            'total_cost' => $totalCost,
            'spareparts' => $request->spareparts,
            'notes' => $request->notes,
            'technician_name' => $request->technician_name,
            'status' => 'masuk',
            'invoice_status' => 'pending',
        ]);

        // Create detailed service items
        foreach ($request->services as $item) {
            ServiceDetail::create([
                'service_history_id' => $history->id,
                'name' => $item['name'],
                'price' => $item['price'],
            ]);
        }

        // Update vehicle dates if provided
        if ($request->next_service_date) {
            $vehicle->update([
                'last_service_date' => $request->service_date,
                'next_service_date' => $request->next_service_date
            ]);
        }

        return back()->with('success', 'Data servis, pelanggan, dan rincian biaya berhasil dicatat.');
    }

    public function products()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'shopee_url' => 'nullable|url',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'image_path' => basename($imagePath),
            'shopee_url' => $request->shopee_url,
        ]);

        return back()->with('success', 'Produk berhasil ditambahkan.');
    }

    public function complaints()
    {
        $complaints = Complaint::with('user')->latest()->get();
        return view('admin.complaints', compact('complaints'));
    }

    public function resolveComplaint(Complaint $complaint)
    {
        $complaint->update(['status' => 'resolved']);
        return back()->with('success', 'Keluhan ditandai sebagai selesai.');
    }

    public function sendReminder(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
        ]);

        $vehicle = Vehicle::with('user')->find($request->vehicle_id);
        $user = $vehicle->user;

        $token = config('services.fonnte.token');
        $apiUrl = config('services.fonnte.api_url');

        if (!$token) {
            return back()->with('error', 'Fonnte token belum dikonfigurasi.');
        }

        $message = "Halo {$user->name}, ini pengingat dari Bengkel Autosamsi. Kendaraan Anda ({$vehicle->brand} - {$vehicle->plate_number}) sudah waktunya ganti oli. Hubungi kami untuk booking servis. Terima kasih!";

        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->asForm()->post($apiUrl, [
            'target' => $user->whatsapp_number,
            'message' => $message,
        ]);

        if ($response->successful() && data_get($response->json(), 'status') !== false) {
            return back()->with('success', 'Notifikasi WhatsApp berhasil dikirim.');
        }

        return back()->with('error', 'Gagal mengirim WhatsApp: ' . $response->body());
    }

    public function updateService(Request $request, ServiceHistory $history)
    {
        $request->validate([
            'status' => 'nullable|in:masuk,pengerjaan,selesai',
            'invoice_status' => 'nullable|in:pending,lunas',
            'total_cost' => 'nullable|numeric',
            'spareparts' => 'nullable|string',
        ]);

        $data = $request->only(['status', 'invoice_status', 'total_cost', 'spareparts']);
        
        if (isset($data['invoice_status']) && $data['invoice_status'] === 'lunas' && $history->invoice_status !== 'lunas') {
            $data['paid_at'] = now();
        }

        $history->update($data);

        // If status changed to pengerjaan, prepare WhatsApp draft
        if ($request->status === 'pengerjaan') {
            $vehicle = $history->vehicle;
            $user = $vehicle->user;
            $message = "Halo {$user->name}, kami Bengkel Autosamsi ingin menginfokan bahwa kendaraan Anda ({$vehicle->plate_number} - {$vehicle->brand} {$vehicle->model}) sedang mulai dikerjakan. Mohon ditunggu ya!";
            
            $waUrl = "https://wa.me/" . preg_replace('/[^0-9]/', '', $user->whatsapp_number) . "?text=" . urlencode($message);
            
            return back()->with('success', 'Status diperbarui ke PENGERJAAN. Membuka WhatsApp...')->with('whatsapp_open', $waUrl);
        }

        // If status changed to selesai, prepare WhatsApp draft
        if ($request->status === 'selesai') {
            $vehicle = $history->vehicle;
            $user = $vehicle->user;
            $message = "Halo {$user->name}, kendaraan Anda ({$vehicle->brand} - {$vehicle->plate_number}) sudah SELESAI dikerjakan dan siap diambil. Silakan datang ke bengkel. Terima kasih!";
            
            $waUrl = "https://wa.me/" . preg_replace('/[^0-9]/', '', $user->whatsapp_number) . "?text=" . urlencode($message);
            
            return back()->with('success', 'Status diperbarui ke SELESAI. Membuka WhatsApp...')->with('whatsapp_open', $waUrl);
        }

        return back()->with('success', 'Data servis berhasil diperbarui.');
    }

    public function sendSelesaiNotification(ServiceHistory $history)
    {
        $vehicle = $history->vehicle()->with('user')->first();
        $user = $vehicle->user;

        $token = config('services.fonnte.token');
        $apiUrl = config('services.fonnte.api_url');

        if (!$token) {
            return back()->with('error', 'Fonnte token belum dikonfigurasi.');
        }

        $message = "Halo {$user->name}, kendaraan Anda ({$vehicle->brand} - {$vehicle->plate_number}) dengan riwayat servis {$history->service_type} sudah SELESAI dikerjakan dan siap diambil. Silakan datang ke bengkel. Terima kasih!";

        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->asForm()->post($apiUrl, [
            'target' => $user->whatsapp_number,
            'message' => $message,
        ]);

        if ($response->successful() && data_get($response->json(), 'status') !== false) {
            return back()->with('success', 'Notifikasi SELESAI berhasil dikirim via WhatsApp.');
        }

        return back()->with('error', 'Gagal mengirim WhatsApp: ' . $response->body());
    }

    public function confirmPayment(ServiceHistory $history)
    {
        $history->update([
            'invoice_status' => 'lunas',
            'paid_at' => now()
        ]);
        return back()->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }

    public function downloadInvoice(ServiceHistory $history)
    {
        $history->load(['vehicle.user', 'details']);
        $pdf = Pdf::loadView('admin.invoice', compact('history'));
        
        $fileName = 'invoice-autosamsi-' . $history->id . '.pdf';
        return $pdf->download($fileName);
    }

    public function exportExcel()
    {
        $fileName = 'laporan-servis-' . date('Y-m-d') . '.csv';
        $histories = ServiceHistory::with('vehicle.user')->latest()->get();

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'X-Content-Type-Options' => 'nosniff',
            'Cache-Control' => 'no-store, no-cache, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ];

        $columns = array('Tanggal', 'Plat Nomor', 'Pemilik', 'Kendaraan', 'Jenis Servis', 'Spareparts', 'Total Biaya', 'Status', 'Pembayaran');

        $callback = function() use($histories, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($histories as $history) {
                $row['Tanggal']      = $history->service_date;
                $row['Plat Nomor']   = $history->vehicle->plate_number;
                $row['Pemilik']      = $history->vehicle->user->name;
                $row['Kendaraan']    = $history->vehicle->brand . ' ' . $history->vehicle->model;
                $row['Jenis Servis'] = $history->service_type;
                $row['Spareparts']   = $history->spareparts;
                $row['Total Biaya']  = $history->total_cost;
                $row['Status']       = strtoupper($history->status);
                $row['Pembayaran']   = strtoupper($history->invoice_status);

                fputcsv($file, array(
                    $row['Tanggal'],
                    $row['Plat Nomor'],
                    $row['Pemilik'],
                    $row['Kendaraan'],
                    $row['Jenis Servis'],
                    $row['Spareparts'],
                    $row['Total Biaya'],
                    $row['Status'],
                    $row['Pembayaran']
                ));
            }

            fclose($file);
        };

        return response()->streamDownload($callback, $fileName, $headers);
    }
}
