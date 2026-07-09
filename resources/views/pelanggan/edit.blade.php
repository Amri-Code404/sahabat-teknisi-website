@extends('layouts.admin')

@section('title', 'Edit Pelanggan')

@section('content')

<div class="container-fluid">
    <div class="mb-4">
        <h3 class="fw-bold">Edit Pelanggan</h3>
        <p class="text-muted">Perbarui informasi pelanggan</p>
    </div>


    <div class="dashboard-card">
        <form action="{{ route('pelanggan.update', $customer) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nama Pelanggan</label>
                    <input
                        type="text"
                        name="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama', $customer->nama) }}"
                        placeholder="Masukkan nama pelanggan"
                        required>

                    @error('nama')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email (Opsional)</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $customer->email) }}"
                        placeholder="pelanggan@gmail.com">

                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nomor HP</label>
                    <input
                        type="text"
                        name="no_hp"
                        class="form-control @error('no_hp') is-invalid @enderror"
                        value="{{ old('no_hp', $customer->no_hp) }}"
                        placeholder="08xxxxxxxxxx"
                        required>

                    @error('no_hp')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="aktif"
                            {{ old('status', $customer->status) == 'aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="nonaktif"
                            {{ old('status', $customer->status) == 'nonaktif' ? 'selected' : '' }}>
                            Nonaktif
                        </option>
                    </select>

                    @error('status')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Alamat Lengkap</label>
                    <textarea
                        name="alamat"
                        rows="3"
                        class="form-control @error('alamat') is-invalid @enderror"
                        placeholder="Alamat lengkap pelanggan"
                        required>{{ old('alamat', $customer->alamat) }}</textarea>

                    @error('alamat')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>

            <div class="mt-4 d-flex gap-2 justify-content-start">

                <button type="submit" class="btn btn-warning px-4 text-white fw-semibold d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-pencil-square me-2"></i> Update Pelanggan
                </button>

                <a href="{{ route('pelanggan.index') }}" class="btn btn-light border px-4 d-inline-flex align-items-center justify-content-center">
                    Kembali
                </a>

            </div>
        </form>
    </div>


</div>
@endsection