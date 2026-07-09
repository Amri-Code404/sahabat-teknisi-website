@extends('layouts.admin')

@section('title', 'Data Servis')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">Data Order Layanan Aplikasi</h3>
            <p class="text-muted">Kelola tugas dan layanan teknisi</p>
        </div>
        <a href="{{ route('servis.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Order Layanan
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
                        <th>Pelangan</th>
                        <th>Layanan</th>
                        <th>Teknisi</th>
                        <th>Biaya</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="fw-semibold">{{ $item->customer->nama }}</div>
                            <small class="text-muted">{{ $item->customer->no_hp }}</small>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $item->jenis_layanan }}</span>
                            <div class="small text-muted mt-1">{{ Str::limit($item->keluhan, 30) }}</div>
                        </td>
                        <td>{{ $item->technician->nama ?? 'Belum Ditunjuk' }}</td>
                        <td>Rp {{ number_format($item->biaya, 0, ',', '.') }}</td>
                        <td>
                            @if($item->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($item->status == 'proses')
                            <span class="badge bg-primary">Proses</span>
                            @elseif($item->status == 'selesai')
                            <span class="badge bg-success">Selesai</span>
                            @else
                            <span class="badge bg-danger">Batal</span>
                            @endif
                        </td>
                        <td>

                            <div class="d-flex gap-2">


                                <a href="{{ route('servis.edit', $item) }}"
                                    class="btn btn-sm btn-outline-warning d-flex align-items-center gap-1">

                                    <i class="bi bi-pencil-square"></i>

                                    Edit

                                </a>



                                <form action="{{ route('servis.destroy', $item) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')


                                    <button type="submit"
                                        onclick="return confirm('Hapus data order servis ini?')"
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
                        <td colspan="7" class="text-center py-4">Belum ada order layanan saat ini.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $services->links() }}
    </div>
</div>
@endsection