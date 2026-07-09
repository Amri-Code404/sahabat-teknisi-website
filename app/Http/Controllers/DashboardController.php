<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Service;
use App\Models\Technician;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $total_teknisi = Technician::count();
        $total_pelanggan = Customer::count();

        $servis_aktif = Service::whereIn('status', [
            'pending',
            'proses'
        ])->count();

        $total_pendapatan = Payment::where('status', 'lunas')
            ->sum('jumlah');

        $status_counts = [
            Service::where('status', 'pending')->count(),
            Service::where('status', 'proses')->count(),
            Service::where('status', 'selesai')->count(),
            Service::where('status', 'batal')->count(),
        ];

        $pendapatan_bulanan = Payment::where('status', 'lunas')
            ->select(
                DB::raw("DATE_FORMAT(tanggal_bayar, '%b') as bulan"),
                DB::raw("SUM(jumlah) as total")
            )
            ->groupBy(DB::raw("DATE_FORMAT(tanggal_bayar, '%m'), DATE_FORMAT(tanggal_bayar, '%b')"))
            ->orderBy(DB::raw("DATE_FORMAT(tanggal_bayar, '%m')"), 'asc')
            ->take(6)
            ->get();


        $bulan_pendapatan = $pendapatan_bulanan->pluck('bulan')->toArray();
        $nominal_pendapatan = $pendapatan_bulanan->pluck('total')->toArray();

        if (empty($bulan_pendapatan)) {
            $bulan_pendapatan = ['Belum Ada Data'];
            $nominal_pendapatan = [0];
        }

        return view('dashboard.index', compact(
            'total_teknisi',
            'total_pelanggan',
            'servis_aktif',
            'total_pendapatan',
            'status_counts',
            'bulan_pendapatan',
            'nominal_pendapatan'
        ));
    }
}
