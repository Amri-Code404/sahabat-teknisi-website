@extends('layouts.admin')

@section('title', 'Edit Order Servis')

@section('content')

<div class="container-fluid">
    <div class="mb-4">
        <h3 class="fw-bold">Edit Order Layanan</h3>
        <p class="text-muted">Perbarui data order layanan</p>
    </div>


    <div class="dashboard-card">
        <form action="{{ route('servis.update', $servis) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Pelanggan</label>
                    <select name="customer_id" class="form-select @error('customer_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Pelanggan --</option>

                        @foreach($customers as $cust)
                        <option value="{{ $cust->id }}"
                            {{ old('customer_id', $servis->customer_id) == $cust->id ? 'selected' : '' }}>
                            {{ $cust->nama }} ({{ $cust->no_hp }})
                        </option>
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

                        <option value="Jaringan WiFi"
                            {{ old('jenis_layanan', $servis->jenis_layanan) == 'Jaringan WiFi' ? 'selected' : '' }}>
                            Jaringan WiFi
                        </option>

                        <option value="Servis Komputer"
                            {{ old('jenis_layanan', $servis->jenis_layanan) == 'Servis Komputer' ? 'selected' : '' }}>
                            Servis Komputer
                        </option>

                        <option value="Instalasi Software"
                            {{ old('jenis_layanan', $servis->jenis_layanan) == 'Instalasi Software' ? 'selected' : '' }}>
                            Instalasi Software
                        </option>

                    </select>

                    @error('jenis_layanan')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Teknisi</label>

                    <select name="technician_id" class="form-select @error('technician_id') is-invalid @enderror">

                        <option value="">-- Belum Ditunjuk --</option>

                        @foreach($technicians as $tech)
                        <option value="{{ $tech->id }}"
                            {{ old('technician_id', $servis->technician_id) == $tech->id ? 'selected' : '' }}>
                            {{ $tech->nama }} - {{ $tech->spesialisasi }}
                        </option>
                        @endforeach

                    </select>

                    @error('technician_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Biaya (Rp)</label>

                    <input
                        type="number"
                        name="biaya"
                        class="form-control @error('biaya') is-invalid @enderror"
                        value="{{ old('biaya', $servis->biaya) }}"
                        min="0"
                        required>

                    @error('biaya')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Status</label>

                    <select name="status" class="form-select">

                        <option value="pending"
                            {{ old('status', $servis->status) == 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="proses"
                            {{ old('status', $servis->status) == 'proses' ? 'selected' : '' }}>
                            Proses
                        </option>

                        <option value="selesai"
                            {{ old('status', $servis->status) == 'selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>

                        <option value="batal"
                            {{ old('status', $servis->status) == 'batal' ? 'selected' : '' }}>
                            Batal
                        </option>

                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label">Keluhan / Detail Tugas</label>

                    <textarea
                        name="keluhan"
                        rows="3"
                        class="form-control @error('keluhan') is-invalid @enderror"
                        required>{{ old('keluhan', $servis->keluhan) }}</textarea>

                    @error('keluhan')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>
            <div class="mt-4 d-flex gap-2 justify-content-start">

                <button type="submit" class="btn btn-warning px-4 text-white fw-semibold d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-pencil-square me-2"></i> Update Order
                </button>

                <a href="{{ route('servis.index') }}" class="btn btn-light border px-4 d-inline-flex align-items-center justify-content-center">
                    Kembali
                </a>

            </div>

        </form>
    </div>


</div>
@endsection