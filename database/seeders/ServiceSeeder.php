<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Technician;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $customerIds = Customer::pluck('id')->toArray();
        $technicianIds = Technician::pluck('id')->toArray();

        if (empty($customerIds) || empty($technicianIds)) {
            return;
        }

        $services = [
            
            [
                'customer_id'   => $customerIds[0],
                'technician_id' => $technicianIds[1],
                'jenis_layanan' => 'Servis Komputer',
                'keluhan'       => 'Instal ulang OS laptop',
                'biaya'         => 100000,
                'status'        => 'selesai',
                'created_at'    => Carbon::now()->subMonths(2)->subDays(10),
            ],
            [
                'customer_id'   => $customerIds[1],
                'technician_id' => $technicianIds[2] ?? $technicianIds[0],
                'jenis_layanan' => 'Servis Komputer',
                'keluhan'       => 'Perbaikan USB port',
                'biaya'         => 100000,
                'status'        => 'selesai',
                'created_at'    => Carbon::now()->subMonths(2)->subDays(5),
            ],

           
            [
                'customer_id'   => $customerIds[2] ?? $customerIds[0],
                'technician_id' => $technicianIds[1],
                'jenis_layanan' => 'Servis Komputer',
                'keluhan'       => 'Komputer lemot dan bersihkan debu internal',
                'biaya'         => 150000,
                'status'        => 'selesai',
                'created_at'    => Carbon::now()->subMonth()->subDays(20),
            ],
            [
                'customer_id'   => $customerIds[3] ?? $customerIds[0],
                'technician_id' => $technicianIds[0],
                'jenis_layanan' => 'Jaringan WiFi',
                'keluhan'       => 'Setting ulang Router kos-kosan',
                'biaya'         => 350000,
                'status'        => 'selesai',
                'created_at'    => Carbon::now()->subMonth()->subDays(5),
            ],
            [
                'customer_id'   => $customerIds[4] ?? $customerIds[1],
                'technician_id' => $technicianIds[1],
                'jenis_layanan' => 'Servis Komputer',
                'keluhan'       => 'Ganti Keyboard Laptop',
                'biaya'         => 250000,
                'status'        => 'batal', 
                'created_at'    => Carbon::now()->subMonth()->subDays(12),
            ],

          
            [
                'customer_id'   => $customerIds[0],
                'technician_id' => $technicianIds[0],
                'jenis_layanan' => 'Jaringan WiFi',
                'keluhan'       => 'Instalasi jaringan Mikrotik & WiFi kantor',
                'biaya'         => 750000,
                'status'        => 'selesai',
                'created_at'    => Carbon::now()->subDays(8),
            ],
            [
                'customer_id'   => $customerIds[1],
                'technician_id' => $technicianIds[1],
                'jenis_layanan' => 'Servis Komputer',
                'keluhan'       => 'Upgrade SSD dan RAM PC',
                'biaya'         => 300000,
                'status'        => 'selesai',
                'created_at'    => Carbon::now()->subDays(4),
            ],
            [
                'customer_id'   => $customerIds[2] ?? $customerIds[0],
                'technician_id' => $technicianIds[1],
                'jenis_layanan' => 'Servis Komputer',
                'keluhan'       => 'Komputer Blue Screen mendadak',
                'biaya'         => 200000,
                'status'        => 'proses', 
                'created_at'    => Carbon::now()->subDays(1),
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
