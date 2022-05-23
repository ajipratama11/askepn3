@extends('layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pasien</h1>
        <a href="{{ route('pasien.edit',$pasien->id) }}" class="btn btn-primary"><i
                class="fas fa-download fa-sm text-white-50"></i> Edit Pasien</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pasien</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <span class="font-weight-bolder"> No Rekam Medik</span>
                    <p class="font-weight-normal">{{ $pasien->no_rm}}</p>
                    <span class="font-weight-bolder"> Nama Pasien </span>
                    <p class="font-weight-normal">{{ $pasien->nama_pasien }}</p>

                    <span class="font-weight-bolder"> Jenis Kelamin </span>
                    <p class="font-weight-normal">{{ $pasien->jenis_kelamin }}</p>
                </div>
                <div class="col-lg-4">
                    <span class="font-weight-bolder">NIK </span>
                    <p class="font-weight-normal">{{ $pasien->nik }}</p>
                    <span class="font-weight-bolder"> Tempat/Tanggal lahir </span>
                    <p class="font-weight-normal">{{ $pasien->tempat_lahir}}/{{ $pasien->tanggal_lahir}}</p>

                    <span class="font-weight-bolder"> Agama</span>
                    <p class="font-weight-normal">{{ $pasien->agama}}</p>

                </div>
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4">

                </div>
                <div class="col-lg-8">
                    <span class="font-weight-bolder"> Alamat</span>
                    <p class="font-weight-normal">{{ $pasien->alamat}}</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection