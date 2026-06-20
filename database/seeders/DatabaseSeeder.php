<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\ServiceHistory;
use App\Models\ServiceDetail;
use App\Models\Product;
use App\Models\Complaint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Admin
        $admin = User::factory()->create([
            'name' => 'Admin Autosamsi',
            'email' => 'admin@autosamsi.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'whatsapp_number' => '6281234567890',
        ]);

        // Products
        Product::create([
            'name' => 'Shell Helix Ultra 5W-40 4L',
            'image_path' => 'engine_oil_product_1775454802112.png',
            'shopee_url' => 'https://shopee.co.id/shell-helix-ultra',
        ]);
        Product::create([
            'name' => 'Brembo Ceramic Brake Pads Front',
            'image_path' => 'brake_pad_product_1775454822852.png',
            'shopee_url' => 'https://shopee.co.id/brembo-brake-pads',
        ]);

        // ---- CUSTOMERS ----
        $customerData = [
            ['name' => 'Budi Santoso',   'wa' => '6281234567801'],
            ['name' => 'Siti Nurhaliza', 'wa' => '6281234567802'],
            ['name' => 'Ahmad Fauzi',    'wa' => '6281234567803'],
            ['name' => 'Dewi Lestari',   'wa' => '6281234567804'],
            ['name' => 'Hendra Gunawan', 'wa' => '6281234567805'],
            ['name' => 'Rina Marlina',   'wa' => '6281234567806'],
            ['name' => 'Agus Wijaya',    'wa' => '6281234567807'],
            ['name' => 'Fitri Handayani','wa' => '6281234567808'],
            ['name' => 'Doni Prasetyo',  'wa' => '6281234567809'],
            ['name' => 'Lia Permata',    'wa' => '6281234567810'],
        ];

        $customers = [];
        foreach ($customerData as $i => $d) {
            $customers[] = User::create([
                'name' => $d['name'],
                'email' => 'customer'.($i+1).'@autosamsi.com',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'whatsapp_number' => $d['wa'],
            ]);
        }

        // ---- VEHICLES ----
        $vehicleDefs = [
            ['brand' => 'Toyota', 'model' => 'Avanza 1.3 G',     'plate' => 'B 1234 ABC'],
            ['brand' => 'Daihatsu', 'model' => 'Xenia 1.3 R',    'plate' => 'B 2345 BCD'],
            ['brand' => 'Honda',  'model' => 'CR-V 2.4 AT',      'plate' => 'B 3456 CDE'],
            ['brand' => 'Suzuki', 'model' => 'Ertiga GL',         'plate' => 'B 4567 DEF'],
            ['brand' => 'Toyota', 'model' => 'Innova 2.0 G',     'plate' => 'B 5678 EFG'],
            ['brand' => 'Mitsubishi', 'model' => 'Pajero Sport Dakar', 'plate' => 'B 6789 FGH'],
            ['brand' => 'Isuzu',  'model' => 'Traga Box',         'plate' => 'B 7890 GHI'],
            ['brand' => 'Toyota', 'model' => 'Hilux 2.4 D Cab',  'plate' => 'B 8901 HIJ'],
            ['brand' => 'Honda',  'model' => 'Brio Satya 1.2',   'plate' => 'B 9012 IJK'],
            ['brand' => 'Daihatsu', 'model' => 'Terios R',       'plate' => 'B 0123 JKL'],
            ['brand' => 'Toyota', 'model' => 'Fortuner 2.4 VRZ', 'plate' => 'B 1123 KLM'],
            ['brand' => 'Nissan', 'model' => 'Livina 1.5 VL',    'plate' => 'B 2123 LMN'],
            ['brand' => 'Wuling', 'model' => 'Confero S ACT',    'plate' => 'B 3123 MNO'],
            ['brand' => 'Suzuki', 'model' => 'Carry 1.5 Pickup', 'plate' => 'B 4123 NOP'],
            ['brand' => 'Mitsubishi', 'model' => 'L300 Diesel',  'plate' => 'B 5123 OPQ'],
        ];

        $vehicles = [];
        foreach ($vehicleDefs as $i => $vd) {
            $customerIdx = $i < 10 ? $i : $i % 10;
            $vehicles[] = Vehicle::create([
                'user_id' => $customers[$customerIdx]->id,
                'brand' => $vd['brand'],
                'model' => $vd['model'],
                'plate_number' => $vd['plate'],
                'last_service_date' => null,
                'next_service_date' => null,
            ]);
        }

        // ---- SERVICE HISTORIES (20 total, spread across 6 months) ----
        $serviceTypes = [
            'Ganti Oli Mesin + Filter',
            'Tune Up Mesin',
            'Ganti Kampas Rem Depan',
            'Overhaul Mesin Diesel',
            'Service AC + Evaporator',
            'Ganti Timing Belt',
            'Spooring & Balancing',
            'Ganti Shock Absorber',
            'Turbocharger Repair',
            'Injection Pump Calibration',
            'Ganti Oli Gardan & Transmisi',
            'Cuci Tangki + Ganti Filter Solar',
            'Ganti Aki / Baterai',
            'Perbaikan Sistem Kelistrikan',
            'Body Repair & Repaint',
            'Ganti Ball Joint & Tie Rod',
            'Service Berkala 40000 Km',
            'Ganti Ban + Spooring',
            'Engine Tune Up Diesel Commonrail',
            'Perbaikan Power Steering',
        ];

        $monthBases = [
            Carbon::now()->subMonths(5)->startOfMonth(),
            Carbon::now()->subMonths(4)->startOfMonth(),
            Carbon::now()->subMonths(3)->startOfMonth(),
            Carbon::now()->subMonths(2)->startOfMonth(),
            Carbon::now()->subMonths(1)->startOfMonth(),
            Carbon::now()->startOfMonth(),
        ];

        // Distribute ~3-4 services per month across 6 months
        $serviceCountsPerMonth = [3, 3, 4, 3, 4, 3]; // total 20
        $techNames = ['Agus', 'Bambang', 'Dodi', 'Eko', 'Fajar'];

        $historyIdx = 0;
        foreach ($monthBases as $mIdx => $monthBase) {
            $count = $serviceCountsPerMonth[$mIdx];
            for ($j = 0; $j < $count; $j++) {
                $vehicle = $vehicles[$historyIdx % count($vehicles)];
                $serviceDate = (clone $monthBase)->addDays(rand(1, 25));
                $statuses = ['masuk', 'pengerjaan', 'selesai'];
                $status = $statuses[array_rand($statuses)];
                $invoiceStatus = $status === 'selesai' ? (rand(0, 1) ? 'lunas' : 'pending') : 'pending';

                $jasaCost = rand(150000, 2500000);
                $sparepartCost = rand(0, 1) ? rand(50000, 3500000) : 0;

                $history = ServiceHistory::create([
                    'vehicle_id' => $vehicle->id,
                    'service_type' => $serviceTypes[$historyIdx],
                    'service_date' => $serviceDate,
                    'technician_name' => $techNames[array_rand($techNames)],
                    'notes' => rand(0, 1) ? 'Pelanggan minta estimasi sebelum pengerjaan.' : null,
                    'status' => $status,
                    'invoice_status' => $invoiceStatus,
                    'total_cost' => $jasaCost + $sparepartCost,
                    'spareparts' => null,
                    'next_service_date' => (clone $serviceDate)->addMonths(rand(3, 6)),
                ]);

                // Service detail (jasa)
                $jasaNames = ['Jasa Service', 'Biaya Bongkar Pasang', 'Biaya Diagnosa', 'Jasa Tune Up', 'Biaya Kalibrasi'];
                ServiceDetail::create([
                    'service_history_id' => $history->id,
                    'type' => 'jasa',
                    'name' => $jasaNames[array_rand($jasaNames)],
                    'price' => $jasaCost,
                ]);

                // Sparepart detail (if any)
                if ($sparepartCost > 0) {
                    $partNames = ['Oli Mesin Shell 4L', 'Filter Oli', 'Kampas Rem', 'Timing Belt Kit', 'Busi NGK', 'Filter Solar', 'Aki GS 12V', 'Shock Absorber Kayaba', 'Ball Joint 555', 'Bearing Roda'];
                    ServiceDetail::create([
                        'service_history_id' => $history->id,
                        'type' => 'sparepart',
                        'name' => $partNames[array_rand($partNames)],
                        'price' => $sparepartCost,
                    ]);
                }

                // Update vehicle dates
                $vehicle->update([
                    'last_service_date' => $serviceDate,
                    'next_service_date' => $history->next_service_date,
                ]);

                $historyIdx++;
            }
        }

        // ---- COMPLAINTS ----
        $complaintMessages = [
            'Servis terlalu lama, mobil saya sudah 3 hari belum selesai.',
            'Hasil pengecatan kurang rapi, ada bercak di bagian pintu.',
            'AC tidak dingin padahal sudah diservis minggu lalu.',
            'Tagihan tidak sesuai estimasi awal, mohon klarifikasi.',
            'Teknisi kurang komunikatif selama proses pengerjaan.',
        ];

        foreach ($complaintMessages as $i => $msg) {
            Complaint::create([
                'user_id' => $customers[$i % count($customers)]->id,
                'message' => $msg,
                'status' => $i < 3 ? 'pending' : 'resolved',
            ]);
        }
    }
}
