<?php

namespace Tests\Feature;

use App\Models\ServiceHistory;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class PublicTrackingTest extends TestCase
{
    use RefreshDatabase;

    public function test_tracking_requires_matching_whatsapp_and_plate_number(): void
    {
        $user = User::factory()->create([
            'role' => 'customer',
            'whatsapp_number' => '6281234567890',
        ]);

        $vehicle = Vehicle::create([
            'user_id' => $user->id,
            'brand' => 'Toyota',
            'model' => 'Avanza',
            'plate_number' => 'B 1234 ABC',
        ]);

        ServiceHistory::create([
            'vehicle_id' => $vehicle->id,
            'service_date' => now()->toDateString(),
            'service_type' => 'Ganti Oli',
            'status' => 'masuk',
            'invoice_status' => 'pending',
            'total_cost' => 100000,
        ]);

        $this->get('/track?whatsapp_number=081234567890&plate_number=B%201234%20ABC')
            ->assertOk()
            ->assertSee('B 1234 ABC');

        $this->get('/track?whatsapp_number=081234567890&plate_number=B%209999%20ZZZ')
            ->assertRedirect();
    }

    public function test_public_invoice_requires_signed_url(): void
    {
        $user = User::factory()->create([
            'role' => 'customer',
            'whatsapp_number' => '6281234567890',
        ]);

        $vehicle = Vehicle::create([
            'user_id' => $user->id,
            'brand' => 'Toyota',
            'model' => 'Avanza',
            'plate_number' => 'B 1234 ABC',
        ]);

        $history = ServiceHistory::create([
            'vehicle_id' => $vehicle->id,
            'service_date' => now()->toDateString(),
            'service_type' => 'Ganti Oli',
            'status' => 'masuk',
            'invoice_status' => 'pending',
            'total_cost' => 100000,
        ]);

        $this->get(route('public.download-invoice', $history))->assertForbidden();

        $this->get(URL::signedRoute('public.download-invoice', $history))->assertOk();
    }
}
