@extends('layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Diagnosa</h1>

    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Laporan</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <span class="font-weight-bolder"> No Rekam Medik</span>
                    <p class="font-weight-normal">{{ $pengkajian->pasien->no_rm }}</p>
                    <span class="font-weight-bolder"> Nama Diagnosa </span>
                    <p class="font-weight-normal">{{$pengkajian->nic($pengkajian->id)}}</p>

                    <a class="btn btn-info btn-sm" href="{{ route('cetak_laporan.show',$pengkajian->id)}}"> Cetak
                        Laporan</a></a>
                </div>
                <div class="col-lg-4">

                    <span class="font-weight-bolder"> Nama Pasien </span>
                    <p class="font-weight-normal">{{ $pengkajian->pasien->nama_pasien }}</p>
                    <span class="font-weight-bolder"> Tanggal </span>
                    <p class="font-weight-normal">{{$pengkajian->tanggal}}</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection