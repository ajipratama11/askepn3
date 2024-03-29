@extends('layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pasien</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pasien</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('pasien.store') }}">
                <div class="row">
                    @csrf
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">No Rekam Medik</label>
                            <input name="no_rm" type="text" class="form-control">
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Nama pasien</label>
                            <input name="nama_pasien" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Ibu Kandung</label>
                            <input name="ibu_kandung" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat lahir</label>
                            <input name="tempat_lahir" type="text" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis kelamin</label>
                            <select name="jenis_kelamin" class="custom-select" id="inputGroupSelect01">
                                <option value="" disabled selected hidden>Pilih jenis kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input name="nik" type="number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tangggal lahir</label>
                            <input name="tanggal_lahir" type="date" class="form-control">
                        </div>

                        <label class="form-label">Agama</label>
                        <select name="agama" class="custom-select" id="inputGroupSelect01">
                            <option value="" disabled selected hidden>Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" type="text" class="form-control"></textarea>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary ">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection