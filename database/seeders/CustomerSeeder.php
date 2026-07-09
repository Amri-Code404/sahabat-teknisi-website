<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            [
                'nama' => 'Rian Hidayat',
                'email' => 'rian@gmail.com',
                'no_hp' => '085299887766',
                'alamat' => 'Jl. Sudirman No. 101, Kampar',
                'status' => 'aktif'
            ],

            [
                'nama' => 'Dewi Lestari',
                'email' => 'dewi@gmail.com',
                'no_hp' => '085377665544',
                'alamat' => 'Jl. Tuanku Tambusai No. 24, Rokan Hulu',
                'status' => 'aktif'
            ],

            [
                'nama' => 'Bambang Tri',
                'email' => 'bambang@gmail.com',
                'no_hp' => '081266554433',
                'alamat' => 'Jl. Arifin Ahmad No. 50, Rokan Hilir',
                'status' => 'aktif'
            ],

            [
                'nama' => 'Siti Kamila',
                'email' => 'sitikamila@gmail.com',
                'no_hp' => '081399881122',
                'alamat' => 'Jl. Panam No. 12, Duri',
                'status' => 'aktif'
            ],

            [
                'nama' => 'Budi Setiadi',
                'email' => 'budisetiadi@gmail.com',
                'no_hp' => '082233445566',
                'alamat' => 'Jl. Riau No. 88, Pekanbaru',
                'status' => 'aktif'
            ],

        ];

        foreach ($customers as $cust) {
            Customer::create($cust);
        }
    }
}
