<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        \App\Models\User::factory()->create([
            'name' => 'Admin Autosamsi',
            'email' => 'admin@autosamsi.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'admin',
            'whatsapp_number' => '6281234567890',
        ]);

        // Products
        \App\Models\Product::create([
            'name' => 'Shell Helix Ultra 5W-40 4L',
            'image_path' => 'engine_oil_product_1775454802112.png',
            'shopee_url' => 'https://shopee.co.id/shell-helix-ultra',
        ]);

        \App\Models\Product::create([
            'name' => 'Brembo Ceramic Brake Pads Front',
            'image_path' => 'brake_pad_product_1775454822852.png',
            'shopee_url' => 'https://shopee.co.id/brembo-brake-pads',
        ]);
    }
}
