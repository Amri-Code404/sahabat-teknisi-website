@extends('layouts.admin')

@section('title', 'Edit Pembayaran')

@section('content')

<div class="container-fluid">


    <div class="mb-4">
        <h3 class="fw-bold">Edit Pembayaran</h3>
        <p class="text-muted">Perbarui data pembayaran pelanggan.</p>
    </div>


    <div class="dashboard-card">

        <form action="{{ route('pembayaran.update', $pembayaran) }}" method="POST">

            @csrf
            @method('PUT')


            <div class="row g-3">


                <div class="col-md-6">

                    <label class="form-label">
                        Order Servis
                    </label>


                    <select name="service_id"
                        class="form-select @error('service_id') is-invalid @enderror"
                        required>


                        <option value="">
                            -- Pilih Order Servis --
                        </option>


                        @foreach($services as $service)

                        <option value="{{ $service->id }}"
                            data-biaya="{{ $service->biaya }}"

                            {{ old('service_id', $pembayaran->service_id) == $service->id ? 'selected' : '' }}>


                            {{ $service->customer->nama }}
                            -
                            {{ $service->jenis_layanan }}

                            (Rp {{ number_format($service->biaya,0,',','.') }})

                        </option>


                        @endforeach


                    </select>


                    @error('service_id')

                    <small class="text-danger">
                        {{ $message }}
                    </small>

                    @enderror


                </div>



                <div class="col-md-6">

                    <label class="form-label">
                        Jumlah Pembayaran
                    </label>


                    <input type="number"
                        id="jumlah"
                        name="jumlah"

                        class="form-control @error('jumlah') is-invalid @enderror"

                        value="{{ old('jumlah', $pembayaran->jumlah) }}"

                        min="0"
                        required>


                    @error('jumlah')

                    <small class="text-danger">
                        {{ $message }}
                    </small>

                    @enderror


                </div>



                <div class="col-md-6">

                    <label class="form-label">
                        Metode Pembayaran
                    </label>


                    <select name="metode"
                        class="form-select"
                        required>


                        <option value="Cash"
                            {{ old('metode',$pembayaran->metode)=='Cash'?'selected':'' }}>
                            Cash
                        </option>


                        <option value="Transfer"
                            {{ old('metode',$pembayaran->metode)=='Transfer'?'selected':'' }}>
                            Transfer
                        </option>


                        <option value="QRIS"
                            {{ old('metode',$pembayaran->metode)=='QRIS'?'selected':'' }}>
                            QRIS
                        </option>


                    </select>


                </div>




                <div class="col-md-6">

                    <label class="form-label">
                        Tanggal Pembayaran
                    </label>


                    <input type="date"

                        name="tanggal_bayar"

                        class="form-control"

                        value="{{ old('tanggal_bayar',$pembayaran->tanggal_bayar) }}"

                        required>


                </div>




                <div class="col-md-6">

                    <label class="form-label">
                        Status Pembayaran
                    </label>


                    <select name="status"
                        class="form-select"
                        required>



                        <option value="belum_lunas"

                            {{ old('status',$pembayaran->status)=='belum_lunas'?'selected':'' }}>

                            Belum Lunas

                        </option>



                        <option value="lunas"

                            {{ old('status',$pembayaran->status)=='lunas'?'selected':'' }}>

                            Lunas

                        </option>


                    </select>


                </div>




                <div class="col-12">

                    <label class="form-label">
                        Keterangan
                    </label>


                    <textarea

                        name="keterangan"

                        rows="3"

                        class="form-control"

                        placeholder="Tambahkan keterangan pembayaran">{{ old('keterangan',$pembayaran->keterangan) }}</textarea>


                </div>



            </div>



            <div class="mt-4 d-flex gap-2 justify-content-start">

                <button type="submit" class="btn btn-warning px-4 text-white fw-semibold d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-pencil-square me-2"></i> Update Pembayaran
                </button>

                <a href="{{ route('pembayaran.index') }}" class="btn btn-light border px-4 d-inline-flex align-items-center justify-content-center">
                    Kembali
                </a>

            </div>


        </form>


    </div>


</div>
@endsection

@push('script')

<script>
    document
        .querySelector('select[name="service_id"]')
        .addEventListener('change', function() {

            let biaya =
                this.options[this.selectedIndex]
                .getAttribute('data-biaya');


            document.getElementById('jumlah').value = biaya ?? 0;

        });
</script>

@endpush