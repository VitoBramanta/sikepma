@extends('layout.main')

{{-- @php
  dd($errors->has('kode_barang'));  
@endphp --}}

@section('container')
{{-- Form Head --}}
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Input Data Mahasiswa</h6>

    </div>


    <form action="{{ route('mahasiswa.store') }}" method="post">

        @csrf
        <div class="card-body ">
            <div class="mb-3 row ">
                <label for="formGroupExampleInput" class="form-label font-weight-bold col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nim') is-invalid @enderror " name="nim" required value="{{ old('nim') }}">
                    @error('nim')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>

            <div class="mb-3 row">
                <label for="formGroupExampleInput2" class="form-label font-weight-bold col-sm-2 col-form-label">Nama
                    Mahasiswa</label>
                <div class="col-sm-10">
                    <input name="nama_mahasiswa" type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror " id="formGroupExampleInput2" required value="{{ old('nama_mahasiswa') }}">
                    @error('nama_mahasiswa')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>

            <div class="mb-3 row">
                <label for="formGroupExampleInput2" class="form-label font-weight-bold col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <input name="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror " id="formGroupExampleInput2" required value="{{ old('jurusan') }}">
                    @error('jurusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="formGroupExampleInput3" class="form-label font-weight-bold col-sm-2 col-form-label">Asal Instansi</label>
                <div class="col-sm-10">
                    <input name="asal_instansi" type="text" class="form-control @error('asal_instansi') is-invalid @enderror" id="asal_instansi" required value="{{ old('asal_instansi') }}">
                    @error('asal_instansi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="formGroupExampleInput2" class="form-label font-weight-bold col-sm-2 col-form-label">Jenis</label>
                <div class="col-sm-10">
                    <select class="custom-select" name="jenis" required>
                        <option value="">---- Pilih Jenis ----</option>
                        <option {{ old('jenis' ) == 'KP' ? 'selected' : '' }} value="KP">
                            KP
                        </option>
                        <option {{ old('jenis' ) == 'Magang' ? 'selected' : '' }} value="Magang">
                            Magang</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="formGroupExampleInput6" class="form-label font-weight-bold col-sm-2 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-10">
                    <input type="text" name="tanggal_masuk" class="form-control datepicker @error('tanggal_masuk') is-invalid @enderror" id="datepicker" required value="{{ old('tanggal_masuk') }}">
                    @error('tanggal_masuk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="formGroupExampleInput6" class="form-label font-weight-bold col-sm-2 col-form-label">Tanggal Selesai</label>
                <div class="col-sm-10">
                    <input name="tanggal_selesai" type="text" class="form-control datepicker @error('tanggal_selesai') is-invalid @enderror" id="formGroupExampleInput" required value="{{ old('tanggal_selesai') }}">
                    @error('tanggal_selesai')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="formGroupExampleInput2" class="form-label font-weight-bold col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="custom-select" name="status" required>
                        <option value="">---- Pilih Status ----</option>
                        <option {{ old('status' ) == 'Selesai' ? 'selected' : '' }} value="Selesai">
                            Selesai
                        </option>
                        <option {{ old('status' ) == 'Belum Selesai' ? 'selected' : '' }} value="Belum Selesai">
                            Belum Selesai</option>
                    </select>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-success col-md-3 ms-auto mt-4" type="submit">Submit</button>

            </div>

        </div>



    </form>



</div>

@push('scripts')
<script>
    $(".datepicker").datepicker({
        format: "dd-mm-yyyy",
        autoclose: true //to close picker once year is selected
    });
</script>
@endpush
@endsection