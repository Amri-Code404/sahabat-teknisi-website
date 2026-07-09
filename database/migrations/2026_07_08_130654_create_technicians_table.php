<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('technicians', function (Blueprint $table) {

            $table->id();

            $table->string('nama');

            $table->string('email')
                ->nullable();

            $table->string('no_hp');

            $table->text('alamat')
                ->nullable();

            $table->string('spesialisasi');

            $table->enum('status', [
                'aktif',
                'nonaktif'
            ])
                ->default('aktif');

            $table->string('foto')
                ->nullable();

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('technicians');
    }
};
