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
            <h6 class="m-0 font-weight-bold text-primary">Detail Pengkajian </h6>
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
                        <p class="font-weight-normal">{{ $perawat->name }}</p>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <span class="font-weight-bolder"> Tanggal </span>
                            <p class="font-weight-normal">{{$pengkajian->tanggal ?? ''}}</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <span class="font-weight-bolder"> Ruang </span>
                            <p class="font-weight-normal">{{$pengkajian->ruang ?? ''}}</p>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="mb-3">
                            <span class="font-weight-bolder"> Tensi darah </span>
                            <p class="font-weight-normal">{{$pengkajian->tensi_darah ?? ''}}</p>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="mb-3">
                            <span class="font-weight-bolder"> Suhu </span>
                            <p class="font-weight-normal">{{$pengkajian->suhu ?? ''}}</p>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="mb-3">
                            <span class="font-weight-bolder"> Nadi </span>
                            <p class="font-weight-normal">{{$pengkajian->nadi ?? ''}}</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <span class="font-weight-bolder"> Riwayat penyakit sekarang </span>
                            <p class="font-weight-normal">{{$pengkajian->riwayat_penyakit_sekarang ?? ''}}</p>
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <span class="font-weight-bolder"> Riwayat penyakit terdahulu </span>
                            <p class="font-weight-normal">{{$pengkajian->riwayat_penyakit_terdahulu ?? ''}}</p>
                           
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <span class="font-weight-bolder"> Keluhan </span>
                            <p class="font-weight-normal">{{$pengkajian->keluhan ?? ''}}</p>
                        </div>
                    </div>

                </div>
                <a type="submit" class="btn btn-primary " href="/pengkajian">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection