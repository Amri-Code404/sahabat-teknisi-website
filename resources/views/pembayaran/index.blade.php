@extends('layouts.admin')

@section('title', 'Pembayaran')

@section('content')

<div class="container-fluid">


    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">Data Pembayaran</h3>
            <p class="text-muted">Kelola pembayaran tagihan pelanggan.</p>
        </div>

        <a href="{{ route('pembayaran.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Pembayaran
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="dashboard-card">
        <div class="table-responsive">

            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Layanan</th>
                        <th>Jumlah</th>
                        <th>Metode</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($payments as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <div class="fw-semibold">
                                {{ $item->service->customer->nama }}
                            </div>

                            <small class="text-muted">
                                {{ $item->service->customer->no_hp }}
                            </small>
                        </td>

                        <td>
                            {{ $item->service->jenis_layanan }}
                        </td>

                        <td>
                            Rp {{ number_format($item->jumlah,0,',','.') }}
                        </td>

                        <td>
                            {{ $item->metode }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($item->tanggal_bayar)->format('d-m-Y') }}
                        </td>

                        <td>

                            @if($item->status=='lunas')
                            <span class="badge bg-success">
                                Lunas
                            </span>
                            @else
                            <span class="badge bg-warning text-dark">
                                Belum Lunas
                            </span>
                            @endif

                        </td>

                        <td>

                            <div class="d-flex gap-2">


                                <a href="{{ route('pembayaran.edit', $item) }}"
                                    class="btn btn-sm btn-outline-warning d-flex align-items-center gap-1">

                                    <i class="bi bi-pencil-square"></i>

                                    Edit

                                </a>



                                <form action="{{ route('pembayaran.destroy', $item) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')


                                    <button type="submit"
                                        onclick="return confirm('Hapus data pembayaran ini?')"
                                        class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1">

                                        <i class="bi bi-trash3"></i>

                                        Hapus

                                    </button>


                                </form>


                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="8" class="text-center py-4">
                            Belum ada data pembayaran.
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

    <div class="mt-4">
        {{ $payments->links() }}
    </div>


</div>
@endsection