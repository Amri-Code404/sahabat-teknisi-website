@extends('layouts.admin')

@section('title', 'Data Pelanggan')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">Data Pelanggan</h3>
            <p class="text-muted">Kelola data pelanggan Sahabat Teknisi</p>
        </div>
        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Pelanggan
        </a>
    </div>

    {{-- Alert sukses --}}
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="fw-semibold">{{ $item->nama }}</div>
                        </td>
                        <td>{{ $item->email ?? '-' }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ Str::limit($item->alamat, 50) }}</td>
                        <td>
                            @if($item->status == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                            @else
                            <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">

                                <a href="{{ route('pelanggan.edit', $item) }}"
                                    class="btn btn-sm btn-outline-warning d-flex align-items-center gap-1">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                </a>


                                <form action="{{ route('pelanggan.destroy', $item) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        onclick="return confirm('Hapus data pelanggan ini?')"
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
                        <td colspan="7" class="text-center py-4">Belum ada data pelanggan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $customers->links() }}
    </div>
</div>
@endsection