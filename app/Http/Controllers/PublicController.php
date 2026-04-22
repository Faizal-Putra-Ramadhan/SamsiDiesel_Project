<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\ServiceHistory;
use App\Models\Vehicle;
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

    public function track(Request $request)
    {
        $user = null;
        $vehicles = collect();

        if ($request->has('whatsapp_number')) {
            $request->validate([
                'whatsapp_number' => 'required|string',
            ]);

            $user = User::with(['vehicles.serviceHistories.details'])
                        ->where('whatsapp_number', $request->whatsapp_number)
                        ->where('role', 'customer')
                        ->first();
            
            if ($user) {
                $vehicles = $user->vehicles;
            } else {
                return back()->with('error', 'Nomor WhatsApp tidak ditemukan.');
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
}
