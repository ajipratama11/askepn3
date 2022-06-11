@extends('layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengkajian</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Pengkajian </h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('pengkajian.update',$pasien->id) }}">

                @csrf
                @method('put')
                <div class="row">
                    <div class="col-lg-6">
                        <span class="font-weight-bolder"> No Rekam Medik</span>
                        <p class="font-weight-normal">{{ $pasien->no_rm}}</p>

                        <div class="row">
                            <div class="col-lg-6">
                                <span class="font-weight-bolder"> Nama Pasien </span>
                                <p class="font-weight-normal">{{ $pasien->nama_pasien }}</p>
                            </div>
                            <div class="col-lg-6">
                                <span class="font-weight-bolder"> Jenis Kelamin </span>
                                <p class="font-weight-normal">{{ $pasien->jenis_kelamin }}</p>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-6">
                        <span class="font-weight-bolder"> Nama Perawat </span>
                        <select name="perawat_id" class="custom-select" id="inputGroupSelect01" required>
                            <option value="" disabled selected hidden>Pilih Perawat</option>
                            @foreach ($perawat as $perawat)
                            <option value="{{$perawat->id}}">{{$perawat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <span class="font-weight-bolder"> Tanggal </span>
                            <input name="tanggal" type="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <span class="font-weight-bolder"> Ruang </span>
                            <input name="ruang" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="mb-3">
                            <span class="font-weight-bolder"> Tendi darah </span>
                            <input name="tensi_darah" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="mb-3">
                            <span class="font-weight-bolder"> Suhu </span>
                            <input name="suhu" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="mb-3">
                            <span class="font-weight-bolder"> Nadi </span>
                            <input name="nadi" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <span class="font-weight-bolder"> Riwayat penyakit sekarang </span>
                            <input name="riwayat_penyakit_sekarang" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <span class="font-weight-bolder"> Riwayat penyakit terdahulu </span>
                            <input name="riwayat_penyakit_terdahulu" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <span class="font-weight-bolder"> Keluhan </span>
                            <textarea name="keluhan" type="text" class="form-control" required></textarea>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary ">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection