@extends('layouts.admin')

@section('title', 'Laporan Pendapatan')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4 d-print-none">
        <div>
            <h3 class="fw-bold">Laporan Transaksi & Pendapatan</h3>
            <p class="text-muted">
                Rekapitulasi pendapatan dari layanan servis yang selesai
            </p>
        </div>

        <button onclick="window.print()" class="btn btn-success">
            <i class="bi bi-printer"></i>
            Cetak / Save PDF
        </button>
    </div>


    <div class="dashboard-card mb-4 d-print-none">

        <form action="{{ route('laporan.index') }}" method="GET">

            <div class="row g-3 align-items-end">

                <div class="col-md-4">

                    <label class="form-label fw-semibold">
                        Dari Tanggal
                    </label>

                    <input type="date"
                        name="tgl_mulai"
                        class="form-control"
                        value="{{ $tgl_mulai }}">

                </div>


                <div class="col-md-4">

                    <label class="form-label fw-semibold">
                        Sampai Tanggal
                    </label>

                    <input type="date"
                        name="tgl_selesai"
                        class="form-control"
                        value="{{ $tgl_selesai }}">

                </div>


                <div class="col-md-4">

                    <label class="form-label fw-semibold d-block">
                        Aksi
                    </label>

                    <div class="d-flex gap-2">

                        <button type="submit"
                            class="btn btn-primary flex-fill d-flex justify-content-center align-items-center gap-2">

                            <i class="bi bi-filter"></i>
                            Filter

                        </button>


                        <a href="{{ route('laporan.index') }}"
                            class="btn btn-secondary flex-fill d-flex justify-content-center align-items-center">

                            Reset

                        </a>

                    </div>

                </div>


            </div>

        </form>

    </div>



    {{-- Header Print --}}
    <div class="d-none d-print-block text-center mb-4">

        <h2 class="fw-bold mb-1">
            SAHABAT TEKNISI
        </h2>

        <p class="mb-0 text-muted">
            Laporan Pendapatan Layanan dan Jasa Teknisi
        </p>


        @if($tgl_mulai && $tgl_selesai)

        <small>
            Periode:
            {{ date('d M Y', strtotime($tgl_mulai)) }}
            s/d
            {{ date('d M Y', strtotime($tgl_selesai)) }}
        </small>

        @else

        <small>
            Periode: Semua Data
        </small>

        @endif


        <hr style="border-top:2px solid #000">

    </div>



    {{-- Summary --}}
    <div class="row mb-4">


        <div class="col-md-4">

            <div class="card border-0 shadow-sm p-3 bg-primary text-white">

                <small class="text-uppercase fw-bold opacity-75">
                    Total Pendapatan Masuk
                </small>

                <h3 class="fw-bold mb-0 mt-1">
                    Rp {{ number_format($total_pendapatan,0,',','.') }}
                </h3>

            </div>

        </div>



        <div class="col-md-4">

            <div class="card border shadow-sm p-3">

                <small class="text-uppercase fw-bold text-muted">
                    Total Servis Selesai
                </small>

                <h3 class="fw-bold mb-0 mt-1">
                    {{ $total_servis }} Transaksi
                </h3>

            </div>

        </div>



        <div class="col-md-4">

            <div class="card border-0 shadow-sm p-3 bg-success text-white">

                <small class="text-uppercase fw-bold opacity-75">
                    Total Pelanggan
                </small>

                <h3 class="fw-bold mb-0 mt-1">
                    {{ $total_pelanggan }}
                </h3>

            </div>

        </div>


    </div>




    {{-- Table --}}
    <div class="dashboard-card">

        <div class="table-responsive">

            <table class="table table-striped align-middle">


                <thead>

                    <tr>

                        <th>No</th>
                        <th>Tanggal Selesai</th>
                        <th>Pelanggan</th>
                        <th>Layanan</th>
                        <th>Teknisi</th>
                        <th class="text-end">
                            Pendapatan
                        </th>
                        <th>
                            Pembayaran
                        </th>

                    </tr>

                </thead>



                <tbody>


                    @forelse($reports as $item)


                    <tr>


                        <td>
                            {{ $loop->iteration }}
                        </td>



                        <td>
                            {{ $item->updated_at->format('d M Y') }}
                        </td>



                        <td>

                            <div class="fw-semibold">
                                {{ $item->customer->nama }}
                            </div>

                        </td>



                        <td>

                            <span class="badge bg-light text-dark border">

                                {{ $item->jenis_layanan }}

                            </span>

                        </td>



                        <td>

                            {{ $item->technician->nama ?? 'N/A' }}

                        </td>




                        <td class="text-end fw-semibold text-success">


                            @if($item->payment)

                            Rp {{ number_format($item->payment->jumlah,0,',','.') }}

                            @else

                            Rp 0

                            @endif


                        </td>




                        <td>


                            @if($item->payment)


                            @if($item->payment->status == 'lunas')


                            <span class="badge bg-success">
                                Lunas
                            </span>


                            @else


                            <span class="badge bg-warning text-dark">
                                Belum Lunas
                            </span>


                            @endif


                            @else


                            <span class="badge bg-secondary">
                                Belum Bayar
                            </span>


                            @endif


                        </td>



                    </tr>



                    @empty


                    <tr>

                        <td colspan="7" class="text-center py-4">

                            Tidak ada data transaksi selesai.

                        </td>

                    </tr>


                    @endforelse


                </tbody>


            </table>


        </div>

    </div>


</div>

<style>
    @media print {


        .sidebar,
        .navbar,
        .d-print-none,
        .btn,
        form {

            display: none !important;

        }


        .content-wrapper,
        .container-fluid,
        body {

            padding: 0 !important;
            margin: 0 !important;
            width: 100% !important;

        }


        .dashboard-card {

            box-shadow: none !important;
            border: none !important;

        }


    }
</style>

@endsection