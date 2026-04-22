<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Http;

$token = config('services.fonnte.token') ?? env('FONNTE_TOKEN');
$apiUrl = config('services.fonnte.api_url') ?? env('FONNTE_API_URL');

$response = Http::withHeaders([
    'Authorization' => $token,
])->asForm()->post($apiUrl, [
    'target' => '6282238243113',
    'message' => 'Halo! Ini adalah pesan test dari aplikasi AutoSamsi.',
]);

echo "STATUS_CODE: " . $response->status() . "\n";
$arr = json_decode($response->body(), true);
echo "RESPONSE_JSON:\n";
print_r($arr);
