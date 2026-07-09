<?php

namespace Database\Seeders;

use App\Models\Technician;
use Illuminate\Database\Seeder;

class TechnicianSeeder extends Seeder
{
    public function run(): void
    {
        $technicians = [
            [
                'nama'         => 'Budi Setiawan',
                'email'        => 'budi@gmail.com',
                'no_hp'        => '081234567890',
                'alamat'       => 'Jl. Mangga No. 12, Pekanbaru',
                'spesialisasi' => 'Jaringan WiFi',
                'status'       => 'aktif',
            ],
            [
                'nama'         => 'Andi Wijaya',
                'email'        => 'andi@gmail.com',
                'no_hp'        => '082345678901',
                'alamat'       => 'Jl. Nangka No. 45, Bandung',
                'spesialisasi' => 'Servis Komputer',
                'status'       => 'aktif',
            ],
            [
                'nama'         => 'Siti Aminah',
                'email'        => 'siti@gmail.com',
                'no_hp'        => '083456789012',
                'alamat'       => 'Jl. Melati No. 8, Jakarta',
                'spesialisasi' => 'Servis Komputer',
                'status'       => 'aktif',
            ]
        ];

        foreach ($technicians as $tech) {
            Technician::create($tech);
        }
    }
}
