<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\ServiceHistory;
use App\Models\ServiceDetail;
use App\Models\Product;
use App\Models\Complaint;
use App\Models\NotificationLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
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

        $monthlyRevenue = ServiceHistory::selectRaw(
            "DATE_FORMAT(service_date, '%Y-%m') as month, SUM(total_cost) as total"
        )
            ->whereNotNull('service_date')
            ->groupBy('month')
            ->orderBy('month')
            ->limit(6)
            ->get();

        $monthlyServiceCount = ServiceHistory::selectRaw(
            "DATE_FORMAT(service_date, '%Y-%m') as month, COUNT(*) as count"
        )
            ->whereNotNull('service_date')
            ->groupBy('month')
            ->orderBy('month')
            ->limit(6)
            ->get();

        $serviceStatusCount = ServiceHistory::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'monthlyRevenue',
            'monthlyServiceCount',
            'serviceStatusCount'
        ));
    }

    public function customers()
    {
        $customers = User::where('role', 'customer')->with('vehicles')->get();
        return view('admin.customers', compact('customers'));
    }

    public function services()
    {
        $vehicles = Vehicle::with('user')->get();
        $histories = ServiceHistory::with(['vehicle.user', 'details'])->latest()->get();
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
            'service_items' => 'required|array|min:1',
            'service_items.*.name' => 'required|string',
            'service_items.*.price' => 'required|numeric|min:0',
            'sparepart_items' => 'nullable|array',
            'sparepart_items.*.name' => 'nullable|string',
            'sparepart_items.*.price' => 'nullable|numeric|min:0',
            'service_date' => 'required|date',
            'next_service_date' => 'nullable|date',
            'spareparts' => 'nullable|string',
            'notes' => 'nullable|string',
            'technician_name' => 'nullable|string',
        ]);

        $whatsappNumber = $this->normalizeWhatsappNumber($request->customer_whatsapp);
        $plateNumber = $this->normalizePlateNumber($request->plate_number);

        $user = User::firstOrCreate(
            ['whatsapp_number' => $whatsappNumber],
            [
                'name' => $request->customer_name,
                'role' => 'customer',
                'password' => null, 
                'email' => null,   
            ]
        );

        if ($user->name !== $request->customer_name) {
            $user->update(['name' => $request->customer_name]);
        }

        $vehicle = Vehicle::where('plate_number', $plateNumber)->first();

        if ($vehicle && $vehicle->user_id !== $user->id) {
            return back()
                ->withInput()
                ->with('error', 'Plat nomor sudah terdaftar pada pelanggan lain. Periksa kembali nomor WhatsApp atau data kendaraan.');
        }

        if ($vehicle) {
            $vehicle->update([
                'brand' => $request->vehicle_brand,
                'model' => $request->vehicle_model,
            ]);
        } else {
            $vehicle = Vehicle::create([
                'user_id' => $user->id,
                'brand' => $request->vehicle_brand,
                'model' => $request->vehicle_model,
                'plate_number' => $plateNumber,
            ]);
        }

        $serviceItems = collect($request->service_items);
        $sparepartItems = collect($request->sparepart_items ?? [])->filter(fn ($item) => filled($item['name'] ?? null));

        $totalCost = $serviceItems->sum('price') + $sparepartItems->sum('price');
        $serviceTypeSummary = $serviceItems->pluck('name')->implode(', ');
        $sparepartsSummary = $sparepartItems->pluck('name')->implode(', ');

        $history = ServiceHistory::create([
            'vehicle_id' => $vehicle->id,
            'service_type' => $serviceTypeSummary,
            'service_date' => $request->service_date,
            'next_service_date' => $request->next_service_date,
            'total_cost' => $totalCost,
            'spareparts' => $sparepartsSummary ?: $request->spareparts,
            'notes' => $request->notes,
            'technician_name' => $request->technician_name,
            'status' => 'masuk',
            'invoice_status' => 'pending',
        ]);

        foreach ($serviceItems as $item) {
            ServiceDetail::create([
                'service_history_id' => $history->id,
                'type' => 'jasa',
                'name' => $item['name'],
                'price' => $item['price'] ?? 0,
            ]);
        }

        foreach ($sparepartItems as $item) {
            ServiceDetail::create([
                'service_history_id' => $history->id,
                'type' => 'sparepart',
                'name' => $item['name'],
                'price' => $item['price'] ?? 0,
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
            'image_path' => $imagePath,
            'shopee_url' => $request->shopee_url,
        ]);

        return back()->with('success', 'Produk berhasil ditambahkan.');
    }

    public function destroyProduct(Product $product)
    {
        if ($product->image_path && str_starts_with($product->image_path, 'products/')) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();

        return back()->with('success', 'Produk berhasil dihapus.');
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
            'target' => $this->normalizeWhatsappNumber($user->whatsapp_number),
            'message' => $message,
        ]);

        if ($response->successful() && data_get($response->json(), 'status') !== false) {
            $this->logNotification($user, $vehicle, $message, 'sent');

            return back()->with('success', 'Notifikasi WhatsApp berhasil dikirim.');
        }

        $this->logNotification($user, $vehicle, $message, 'failed');

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
            
            $waUrl = "https://wa.me/" . $this->normalizeWhatsappNumber($user->whatsapp_number) . "?text=" . urlencode($message);
            
            return back()->with('success', 'Status diperbarui ke PENGERJAAN. Membuka WhatsApp...')->with('whatsapp_open', $waUrl);
        }

        // If status changed to selesai, prepare WhatsApp draft
        if ($request->status === 'selesai') {
            $vehicle = $history->vehicle;
            $user = $vehicle->user;
            $message = "Halo {$user->name}, kendaraan Anda ({$vehicle->brand} - {$vehicle->plate_number}) sudah SELESAI dikerjakan dan siap diambil. Silakan datang ke bengkel. Terima kasih!";
            
            $waUrl = "https://wa.me/" . $this->normalizeWhatsappNumber($user->whatsapp_number) . "?text=" . urlencode($message);
            
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
            'target' => $this->normalizeWhatsappNumber($user->whatsapp_number),
            'message' => $message,
        ]);

        if ($response->successful() && data_get($response->json(), 'status') !== false) {
            $this->logNotification($user, $vehicle, $message, 'sent');

            return back()->with('success', 'Notifikasi SELESAI berhasil dikirim via WhatsApp.');
        }

        $this->logNotification($user, $vehicle, $message, 'failed');

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
        $histories = ServiceHistory::with(['vehicle.user', 'details'])->latest()->get();

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'X-Content-Type-Options' => 'nosniff',
            'Cache-Control' => 'no-store, no-cache, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ];

        $columns = array('Tanggal', 'Plat Nomor', 'Pemilik', 'Kendaraan', 'Jenis Servis', 'Biaya Jasa', 'Spareparts', 'Biaya Sparepart', 'Total Biaya', 'Status', 'Pembayaran');

        $callback = function() use($histories, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($histories as $history) {
                $serviceDetails = $history->details->where('type', 'jasa');
                $sparepartDetails = $history->details->where('type', 'sparepart');

                $row['Tanggal']      = $history->service_date;
                $row['Plat Nomor']   = $history->vehicle->plate_number;
                $row['Pemilik']      = $history->vehicle->user->name;
                $row['Kendaraan']    = $history->vehicle->brand . ' ' . $history->vehicle->model;
                $row['Jenis Servis'] = $history->service_type;
                $row['Biaya Jasa']   = $serviceDetails->sum('price');
                $row['Spareparts']   = $sparepartDetails->isNotEmpty() ? $sparepartDetails->pluck('name')->implode(', ') : $history->spareparts;
                $row['Biaya Sparepart'] = $sparepartDetails->sum('price');
                $row['Total Biaya']  = $history->total_cost;
                $row['Status']       = strtoupper($history->status);
                $row['Pembayaran']   = strtoupper($history->invoice_status);

                fputcsv($file, array(
                    $row['Tanggal'],
                    $row['Plat Nomor'],
                    $row['Pemilik'],
                    $row['Kendaraan'],
                    $row['Jenis Servis'],
                    $row['Biaya Jasa'],
                    $row['Spareparts'],
                    $row['Biaya Sparepart'],
                    $row['Total Biaya'],
                    $row['Status'],
                    $row['Pembayaran']
                ));
            }

            fclose($file);
        };

        return response()->streamDownload($callback, $fileName, $headers);
    }

    private function normalizeWhatsappNumber(string $number): string
    {
        $number = preg_replace('/[^0-9]/', '', $number);

        if (str_starts_with($number, '0')) {
            return '62' . substr($number, 1);
        }

        if (str_starts_with($number, '8')) {
            return '62' . $number;
        }

        return $number;
    }

    private function normalizePlateNumber(string $plateNumber): string
    {
        return strtoupper(trim(preg_replace('/\s+/', ' ', $plateNumber)));
    }

    private function logNotification(User $user, Vehicle $vehicle, string $message, string $status): void
    {
        NotificationLog::create([
            'user_id' => $user->id,
            'vehicle_id' => $vehicle->id,
            'sent_at' => now(),
            'message_content' => $message,
            'status' => $status,
        ]);
    }
}
