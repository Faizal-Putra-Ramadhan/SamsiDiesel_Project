<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\ServiceHistory;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $vehicles = $user->vehicles;
        return view('customer.dashboard', compact('vehicles'));
    }

    public function vehicles()
    {
        $user = Auth::user();
        $vehicles = $user->vehicles()->orderBy('last_service_date', 'asc')->get();
        return view('customer.vehicles', compact('vehicles'));
    }

    public function addVehicle(Request $request)
    {
        $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'plate_number' => 'required|string|unique:vehicles',
            'oil_type' => 'nullable|string',
            'last_service_date' => 'nullable|date',
        ]);

        Auth::user()->vehicles()->create($request->all());

        return back()->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    public function history()
    {
        $user = Auth::user();
        $vehicleIds = $user->vehicles()->pluck('id');
        $histories = ServiceHistory::whereIn('vehicle_id', $vehicleIds)->orderBy('service_date', 'desc')->get();
        return view('customer.history', compact('histories'));
    }

    public function complaints()
    {
        $complaints = Auth::user()->complaints()->latest()->get();
        return view('customer.complaints', compact('complaints'));
    }

    public function storeComplaint(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        Auth::user()->complaints()->create([
            'message' => $request->message,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Keluhan berhasil dikirim.');
    }
}
