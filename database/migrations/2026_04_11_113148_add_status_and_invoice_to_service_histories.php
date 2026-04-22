<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('service_histories', function (Blueprint $table) {
            $table->enum('status', ['masuk', 'pengerjaan', 'selesai'])->default('masuk')->after('technician_name');
            $table->enum('invoice_status', ['pending', 'lunas'])->default('pending')->after('status');
            $table->decimal('total_cost', 15, 2)->default(0)->after('invoice_status');
            $table->text('spareparts')->nullable()->after('total_cost');
            $table->timestamp('paid_at')->nullable()->after('spareparts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_histories', function (Blueprint $table) {
            $table->dropColumn(['status', 'invoice_status', 'total_cost', 'spareparts', 'paid_at']);
        });
    }
};
