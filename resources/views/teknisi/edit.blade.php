@extends('layouts.admin')

@section('title', 'Edit Teknisi')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold">Edit Teknisi</h3>
        <p class="text-muted">
            Perbarui data teknisi Sahabat Teknisi
        </p>
    </div>


    <div class="dashboard-card">

        <form action="{{ route('teknisi.update', $teknisi) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')


            <div class="row g-3">


                <div class="col-md-6">

                    <label class="form-label">
                        Nama Teknisi
                    </label>

                    <input type="text"
                        name="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama', $teknisi->nama) }}"
                        required>


                    @error('nama')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror

                </div>



                <div class="col-md-6">

                    <label class="form-label">
                        Email
                    </label>

                    <input type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $teknisi->email) }}">


                    @error('email')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror

                </div>



                <div class="col-md-6">

                    <label class="form-label">
                        Nomor HP
                    </label>

                    <input type="text"
                        name="no_hp"
                        class="form-control @error('no_hp') is-invalid @enderror"
                        value="{{ old('no_hp', $teknisi->no_hp) }}"
                        required>


                    @error('no_hp')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror

                </div>




                <div class="col-md-6">

                    <label class="form-label">
                        Spesialisasi
                    </label>


                    <input type="text"
                        name="spesialisasi"
                        class="form-control @error('spesialisasi') is-invalid @enderror"
                        value="{{ old('spesialisasi', $teknisi->spesialisasi) }}"
                        placeholder="Contoh: Jaringan, Komputer, Software"
                        required>


                    @error('spesialisasi')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror


                </div>





                <div class="col-md-6">

                    <label class="form-label">
                        Status
                    </label>


                    <select name="status"
                        class="form-select">


                        <option value="aktif"
                            {{ old('status',$teknisi->status) == 'aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>


                        <option value="nonaktif"
                            {{ old('status',$teknisi->status) == 'nonaktif' ? 'selected' : '' }}>
                            Nonaktif
                        </option>


                    </select>

                </div>

                <div class="col-12">

                    <label class="form-label">
                        Alamat
                    </label>


                    <textarea
                        name="alamat"
                        rows="3"
                        class="form-control @error('alamat') is-invalid @enderror"
                        required>{{ old('alamat',$teknisi->alamat) }}</textarea>


                    @error('alamat')

                    <small class="text-danger">
                        {{ $message }}
                    </small>

                    @enderror

                </div>

            </div>



            <div class="mt-4 d-flex gap-2 justify-content-start">

                <button type="submit" class="btn btn-warning px-4 text-white fw-semibold d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-pencil-square me-2"></i> Update Teknisi
                </button>

                <a href="{{ route('teknisi.index') }}" class="btn btn-light border px-4 d-inline-flex align-items-center justify-content-center">
                    Kembali
                </a>

            </div>


        </form>


    </div>


</div>


@endsection