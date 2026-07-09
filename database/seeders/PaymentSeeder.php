<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $completedServices = Service::where('status', 'selesai')->get();

        $metodePilihan = [
            'Cash',
            'Transfer',
            'QRIS',
        ];

        foreach ($completedServices as $index => $service) {
            $metode = $metodePilihan[$index % count($metodePilihan)];

            Payment::create([
                'service_id'    => $service->id,
                'jumlah'        => $service->biaya,
                'metode'        => $metode,
                'tanggal_bayar' => Carbon::parse($service->created_at)->format('Y-m-d'),
                'status'        => 'lunas',
                'keterangan'    => 'Pembayaran lunas via ' . $metode,
                'created_at'    => $service->created_at,
            ]);
        }
    }
}
