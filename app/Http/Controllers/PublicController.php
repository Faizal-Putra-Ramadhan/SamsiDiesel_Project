<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\ServiceHistory;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $products = $query->get();
        return view('welcome', compact('products'));
    }

    public function about()
    {
        return view('customer.about');
    }

    public function services()
    {
        return view('customer.services');
    }

    public function dieselService()
    {
        return view('customer.services_diesel');
    }

    public function gasolineService()
    {
        return view('customer.services_gasoline');
    }

    public function bubutService()
    {
        return view('customer.bubut_las');
    }

    public function bodyRepairService()
    {
        return view('customer.body_repair');
    }

    public function gallery()
    {
        return view('customer.gallery');
    }

    public function contact()
    {
        return view('customer.contact');
    }

    public function track(Request $request)
    {
        $user = null;
        $vehicles = collect();

        if ($request->has('whatsapp_number') || $request->has('plate_number')) {
            $request->validate([
                'whatsapp_number' => 'required|string',
                'plate_number' => 'required|string',
            ]);

            $whatsappNumber = $this->normalizeWhatsappNumber($request->whatsapp_number);
            $plateNumber = $this->normalizePlateNumber($request->plate_number);

            $user = User::where('whatsapp_number', $whatsappNumber)
                ->where('role', 'customer')
                ->whereHas('vehicles', fn ($query) => $query->where('plate_number', $plateNumber))
                ->with(['vehicles' => function ($query) use ($plateNumber) {
                    $query->where('plate_number', $plateNumber)
                        ->with(['serviceHistories' => function ($query) {
                            $query->with('details')->orderByDesc('service_date')->orderByDesc('id');
                        }]);
                }])
                ->first();

            if ($user) {
                $vehicles = $user->vehicles;
            } else {
                return back()->with('error', 'Data kendaraan tidak ditemukan untuk kombinasi WhatsApp dan plat nomor tersebut.')->withInput();
            }
        }

        return view('track', compact('user', 'vehicles'));
    }

    public function downloadInvoice(ServiceHistory $history)
    {
        // For public access, we don't check auth, but we load relationships
        $history->load(['vehicle.user', 'details']);
        $pdf = Pdf::loadView('admin.invoice', compact('history'));
        
        $fileName = 'invoice-autosamsi-' . $history->id . '.pdf';
        return $pdf->download($fileName);
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
}
