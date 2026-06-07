<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendServiceReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-service-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send automatic WhatsApp reminders for vehicles scheduled for service today.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = now()->format('Y-m-d');
        $this->info("Checking for vehicles scheduled for service on {$today}...");

        $vehicles = \App\Models\Vehicle::with('user')
            ->whereDate('next_service_date', $today)
            ->get();

        if ($vehicles->isEmpty()) {
            $this->info('No vehicles scheduled for service today.');
            return;
        }

        $token = config('services.fonnte.token');
        $apiUrl = config('services.fonnte.api_url');

        if (!$token) {
            $this->error('Fonnte token is not configured.');
            return;
        }

        $count = 0;
        foreach ($vehicles as $vehicle) {
            $user = $vehicle->user;
            if (!$user || empty($user->whatsapp_number)) {
                continue;
            }

            $message = "Halo {$user->name}, ini pengingat otomatis dari Bengkel Autosamsi. Kendaraan Anda ({$vehicle->brand} - {$vehicle->plate_number}) sudah waktunya ganti oli/servis hari ini. Hubungi kami untuk booking servis. Terima kasih!";

            $response = \Illuminate\Support\Facades\Http::withHeaders([
                'Authorization' => $token,
            ])->asForm()->post($apiUrl, [
                'target' => $this->normalizeWhatsappNumber($user->whatsapp_number),
                'message' => $message,
            ]);

            if ($response->successful() && data_get($response->json(), 'status') !== false) {
                $this->logNotification($user, $vehicle, $message, 'sent');
                $this->info("Sent reminder to {$user->name} ({$user->whatsapp_number})");
                $count++;
            } else {
                $this->logNotification($user, $vehicle, $message, 'failed');
                $this->error("Failed to send reminder to {$user->name}: " . $response->body());
            }
        }

        $this->info("Completed sending {$count} reminders.");
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

    private function logNotification($user, $vehicle, string $message, string $status): void
    {
        \App\Models\NotificationLog::create([
            'user_id' => $user->id,
            'vehicle_id' => $vehicle->id,
            'sent_at' => now(),
            'message_content' => $message,
            'status' => $status,
        ]);
    }
}
