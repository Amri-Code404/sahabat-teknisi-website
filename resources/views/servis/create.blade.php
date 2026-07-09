@extends('layouts.admin')

@section('title', 'Tambah Order Servis')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <h3 class="fw-bold">Tambah Order Layanan</h3>
        <p class="text-muted">Buat daftar layanan atau pasang baru untuk teknisi</p>
    </div>

    <div class="dashboard-card">
        <form action="{{ route('servis.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Pelanggan</label>
                    <select name="customer_id" class="form-select @error('customer_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        @foreach($customers as $cust)
                            <option value="{{ $cust->id }}" {{ old('customer_id') == $cust->id ? 'selected' : '' }}>{{ $cust->nama }} ({{ $cust->no_hp }})</option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jenis Layanan</label>
                    <select name="jenis_layanan" class="form-select @error('jenis_layanan') is-invalid @enderror" required>
                        <option value="">-- Pilih Layanan --</option>
                        <option value="Jaringan WiFi" {{ old('jenis_layanan') == 'Jaringan WiFi' ? 'selected' : '' }}>Jaringan WiFi</option>
                        <option value="Servis Komputer" {{ old('jenis_layanan') == 'Servis Komputer' ? 'selected' : '' }}>Servis Komputer</option>
                    </select>
                    @error('jenis_layanan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Teknisi (Opsional)</label>
                    <select name="technician_id" class="form-select @error('technician_id') is-invalid @enderror">
                        <option value="">-- Tunjuk Teknisi Nanti --</option>
                        @foreach($technicians as $tech)
                            <option value="{{ $tech->id }}" {{ old('technician_id') == $tech->id ? 'selected' : '' }}>{{ $tech->nama }} - {{ $tech->spesialisasi }}</option>
                        @endforeach
                    </select>
                    @error('technician_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Estimasi/Total Biaya (Rp)</label>
                    <input type="number" name="biaya" class="form-control @error('biaya') is-invalid @enderror" value="{{ old('biaya', 0) }}" min="0" required>
                    @error('biaya')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Status Awal</label>
                    <select name="status" class="form-select">
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="proses" {{ old('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label">Keluhan / Detail Tugas</label>
                    <textarea name="keluhan" class="form-control @error('keluhan') is-invalid @enderror" rows="3" placeholder="Jelaskan masalah komputer, lokasi pasang wifi, dll." required>{{ old('keluhan') }}</textarea>
                    @error('keluhan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan Order
                </button>
                <a href="{{ route('servis.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection