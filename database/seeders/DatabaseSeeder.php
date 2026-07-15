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

        // ---- SERVICE HISTORIES ----
        // Realistic service packages with itemized costs
        $servicePackages = [
            [
                'type' => 'Ganti Oli Mesin + Filter',
                'jasa' => [['name' => 'Jasa Ganti Oli', 'price' => 50000]],
                'parts' => [['name' => 'Oli Mesin Shell 5W-30 4L', 'price' => 350000], ['name' => 'Filter Oli Original', 'price' => 85000]],
            ],
            [
                'type' => 'Service Rutin 10.000 Km',
                'jasa' => [['name' => 'Jasa Service Rutin', 'price' => 150000]],
                'parts' => [['name' => 'Oli Mesin 5W-30 4L', 'price' => 380000], ['name' => 'Filter Oli', 'price' => 85000], ['name' => 'Filter Udara', 'price' => 120000]],
            ],
            [
                'type' => 'Ganti Kampas Rem Depan',
                'jasa' => [['name' => 'Jasa Ganti Kampas Rem', 'price' => 80000]],
                'parts' => [['name' => 'Kampas Rem Depan Original', 'price' => 250000]],
            ],
            [
                'type' => 'Tune Up Mesin',
                'jasa' => [['name' => 'Jasa Tune Up', 'price' => 200000]],
                'parts' => [['name' => 'Busi Iridium 4 pcs', 'price' => 280000], ['name' => 'Filter Udara', 'price' => 120000]],
            ],
            [
                'type' => 'Ganti Timing Belt',
                'jasa' => [['name' => 'Jasa Ganti Timing Belt', 'price' => 300000]],
                'parts' => [['name' => 'Timing Belt Kit Original', 'price' => 650000], ['name' => 'Water Pump', 'price' => 350000]],
            ],
            [
                'type' => 'Service AC',
                'jasa' => [['name' => 'Jasa Service AC', 'price' => 175000]],
                'parts' => [['name' => 'Freon R134a 300gr', 'price' => 150000], ['name' => 'Filter Kabin', 'price' => 75000]],
            ],
            [
                'type' => 'Spooring & Balancing',
                'jasa' => [['name' => 'Jasa Spooring & Balancing', 'price' => 120000]],
                'parts' => [],
            ],
            [
                'type' => 'Ganti Aki',
                'jasa' => [['name' => 'Jasa Ganti Aki', 'price' => 30000]],
                'parts' => [['name' => 'Aki GS NS40 45Ah', 'price' => 520000]],
            ],
            [
                'type' => 'Ganti Ban Depan',
                'jasa' => [['name' => 'Jasa Bongkar Pasang Ban', 'price' => 50000]],
                'parts' => [['name' => 'Ban Michelin 195/65 R15', 'price' => 850000]],
            ],
            [
                'type' => 'Overhaul Mesin',
                'jasa' => [['name' => 'Jasa Overhaul Mesin', 'price' => 1500000]],
                'parts' => [['name' => 'Gasket Set Mesin', 'price' => 450000], ['name' => 'Ring Piston STD', 'price' => 350000], ['name' => 'Oil Seal Set', 'price' => 180000]],
            ],
            [
                'type' => 'Turbocharger Repair',
                'jasa' => [['name' => 'Jasa Turbo Repair', 'price' => 800000]],
                'parts' => [['name' => 'Turbocharger Rebuild Kit', 'price' => 1200000]],
            ],
            [
                'type' => 'Service Berkala 20.000 Km',
                'jasa' => [['name' => 'Jasa Service Berkala', 'price' => 200000]],
                'parts' => [['name' => 'Oli Mesin 5W-30 4L', 'price' => 380000], ['name' => 'Filter Oli', 'price' => 85000], ['name' => 'Filter Udara', 'price' => 120000], ['name' => 'Busi NGK 4 pcs', 'price' => 180000]],
            ],
            [
                'type' => 'Ganti Shock Absorber',
                'jasa' => [['name' => 'Jasa Ganti Shock', 'price' => 200000]],
                'parts' => [['name' => 'Shock Absorber Depan KYB', 'price' => 750000]],
            ],
            [
                'type' => 'Perbaikan Power Steering',
                'jasa' => [['name' => 'Jasa Perbaikan Power Steering', 'price' => 350000]],
                'parts' => [['name' => 'Seal Kit Power Steering', 'price' => 250000], ['name' => 'Oli Power Steering', 'price' => 45000]],
            ],
            [
                'type' => 'Ganti Oli Gardan & Transmisi',
                'jasa' => [['name' => 'Jasa Ganti Oli Gardan', 'price' => 75000]],
                'parts' => [['name' => 'Oli Gardan 3L', 'price' => 210000], ['name' => 'Oli Transmisi 4L', 'price' => 320000]],
            ],
            [
                'type' => 'Body Repair & Repaint',
                'jasa' => [['name' => 'Jasa Body Repair', 'price' => 1200000]],
                'parts' => [['name' => 'Cat Original 1L + Clear', 'price' => 450000], ['name' => 'Dempul + Epoxy', 'price' => 150000]],
            ],
            [
                'type' => 'Injection Pump Calibration',
                'jasa' => [['name' => 'Jasa Kalibrasi Pompa', 'price' => 500000]],
                'parts' => [['name' => 'Seal Kit Pompa Injeksi', 'price' => 350000]],
            ],
            [
                'type' => 'Ganti Ball Joint & Tie Rod',
                'jasa' => [['name' => 'Jasa Ganti Ball Joint', 'price' => 150000]],
                'parts' => [['name' => 'Ball Joint 555 Bawah', 'price' => 280000], ['name' => 'Tie Rod End Original', 'price' => 195000]],
            ],
            [
                'type' => 'Engine Tune Up Diesel',
                'jasa' => [['name' => 'Jasa Tune Up Diesel', 'price' => 350000]],
                'parts' => [['name' => 'Filter Solar', 'price' => 95000], ['name' => 'Filter Oli Diesel', 'price' => 120000]],
            ],
            [
                'type' => 'Cuci Tangki + Ganti Filter Solar',
                'jasa' => [['name' => 'Jasa Cuci Tangki', 'price' => 250000]],
                'parts' => [['name' => 'Filter Solar Original', 'price' => 175000]],
            ],
        ];

        $techNames = ['Agus', 'Bambang', 'Dodi', 'Eko', 'Fajar', 'Gunawan'];
        $statusPool = ['masuk', 'pengerjaan', 'selesai', 'selesai', 'selesai'];

        // Generate 45+ services spread across 6 months
        $monthBases = [];
        for ($m = 5; $m >= 0; $m--) {
            $monthBases[] = Carbon::now()->subMonths($m)->startOfMonth();
        }

        // Distribute services: ~7-8 per month
        $servicesPerMonth = [7, 8, 7, 8, 8, 7];
        $historyIdx = 0;

        foreach ($monthBases as $mIdx => $monthBase) {
            $count = $servicesPerMonth[$mIdx];

            for ($j = 0; $j < $count; $j++) {
                $vehicle = $vehicles[$historyIdx % count($vehicles)];
                $serviceDate = (clone $monthBase)->addDays(rand(1, 27));

                $pkg = $servicePackages[$historyIdx % count($servicePackages)];
                $status = $statusPool[array_rand($statusPool)];
                $isSelesai = $status === 'selesai';
                $invoiceStatus = $isSelesai ? (rand(0, 2) ? 'lunas' : 'pending') : 'pending';

                $jasaTotal = collect($pkg['jasa'])->sum('price');
                $partsTotal = collect($pkg['parts'])->sum('price');
                $totalCost = $jasaTotal + $partsTotal;

                $history = ServiceHistory::create([
                    'vehicle_id' => $vehicle->id,
                    'service_type' => $pkg['type'],
                    'service_date' => $serviceDate,
                    'technician_name' => $techNames[array_rand($techNames)],
                    'notes' => $isSelesai && rand(0, 2) === 0 ? 'Pelanggan puas dengan hasil pengerjaan.' : (rand(0, 3) === 0 ? 'Menunggu persetujuan biaya tambahan.' : null),
                    'status' => $status,
                    'invoice_status' => $invoiceStatus,
                    'total_cost' => $totalCost,
                    'spareparts' => null,
                    'next_service_date' => (clone $serviceDate)->addMonths(rand(3, 6)),
                ]);

                // Jasa details
                foreach ($pkg['jasa'] as $jasa) {
                    ServiceDetail::create([
                        'service_history_id' => $history->id,
                        'type' => 'jasa',
                        'name' => $jasa['name'],
                        'price' => $jasa['price'],
                    ]);
                }

                // Sparepart details
                foreach ($pkg['parts'] as $part) {
                    ServiceDetail::create([
                        'service_history_id' => $history->id,
                        'type' => 'sparepart',
                        'name' => $part['name'],
                        'price' => $part['price'],
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
            'Kampas rem depan bunyi setelah diganti 2 minggu lalu.',
            'Oli mesin bocor setelah service rutin kemarin.',
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