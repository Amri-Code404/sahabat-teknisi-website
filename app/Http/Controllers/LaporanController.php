<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tgl_mulai = $request->input('tgl_mulai');
        $tgl_selesai = $request->input('tgl_selesai');


        $query = Service::with([
            'customer',
            'technician',
            'payment'
        ])
            ->where('status', 'selesai');


        if ($tgl_mulai && $tgl_selesai) {

            $query->whereBetween('updated_at', [
                $tgl_mulai . ' 00:00:00',
                $tgl_selesai . ' 23:59:59'
            ]);
        }


        $reports = $query->latest()->get();




        $total_pendapatan = $reports->sum(function ($service) {

            if ($service->payment && $service->payment->status == 'lunas') {

                return $service->payment->jumlah;
            }

            return 0;
        });



        $total_servis = $reports->count();


        $total_pelanggan = $reports
            ->pluck('customer_id')
            ->unique()
            ->count();



        return view('laporan.index', compact(
            'reports',
            'total_pendapatan',
            'total_servis',
            'total_pelanggan',
            'tgl_mulai',
            'tgl_selesai'
        ));
    }
}
