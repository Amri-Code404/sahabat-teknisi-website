@extends('layouts.admin')


@section('title','Tambah Teknisi')


@section('content')


<div class="container-fluid">


    <div class="mb-4">

        <h3 class="fw-bold">
            Tambah Teknisi
        </h3>

        <p class="text-muted">
            Tambahkan teknisi baru ke sistem
        </p>

    </div>




    <div class="dashboard-card">


        <form action="{{ route('teknisi.store') }}" method="POST">
            @csrf
            <div class="row g-3">

                <div class="col-md-6">

                    <label class="form-label">
                        Nama Teknisi
                    </label>


                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        value="{{ old('nama') }}"
                        placeholder="Masukkan nama teknisi">


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


                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="email@gmail.com">


                </div>

                <div class="col-md-6">


                    <label class="form-label">
                        Nomor HP
                    </label>


                    <input
                        type="text"
                        name="no_hp"
                        class="form-control"
                        value="{{ old('no_hp') }}"
                        placeholder="08xxxxxxxxxx">


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


                    <select
                        name="spesialisasi"
                        class="form-select">


                        <option value="">
                            Pilih Spesialisasi
                        </option>


                        <option value="Jaringan WiFi">
                            Jaringan WiFi
                        </option>


                        <option value="Servis Komputer">
                            Servis Komputer
                        </option>


                    </select>


                    @error('spesialisasi')

                    <small class="text-danger">
                        {{ $message }}
                    </small>

                    @enderror


                </div>


                <div class="col-12">


                    <label class="form-label">
                        Alamat
                    </label>


                    <textarea
                        name="alamat"
                        class="form-control"
                        rows="3"
                        placeholder="Alamat teknisi">{{ old('alamat') }}
                    </textarea>
                </div>


                <div class="col-md-6">


                    <label class="form-label">
                        Status
                    </label>


                    <select
                        name="status"
                        class="form-select">


                        <option value="aktif">
                            Aktif
                        </option>


                        <option value="nonaktif">
                            Nonaktif
                        </option>


                    </select>

                </div>
            </div>


            <div class="mt-4">


                <button class="btn btn-primary">

                    <i class="bi bi-save"></i>

                    Simpan

                </button>


                <a href="{{ route('teknisi.index') }}"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </div>
        </form>
    </div>
</div>
@endsection