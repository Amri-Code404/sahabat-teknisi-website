<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_id')
                ->constrained('services')
                ->cascadeOnDelete();

            $table->bigInteger('jumlah');

            $table->enum('metode', [
                'Cash',
                'Transfer',
                'QRIS',
            ]);

            $table->date('tanggal_bayar');

            $table->enum('status', [
                'belum_lunas',
                'lunas'
            ])->default('belum_lunas');

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
