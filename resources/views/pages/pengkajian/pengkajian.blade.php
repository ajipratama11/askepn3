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
            <h6 class="m-0 font-weight-bold text-primary"> Pilih Pasien untuk Dikaji</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="col-1">No Rekam Medik</th>
                        <th class="col-1">Nama Pasien</th>
                        <th class="col-1">Tanggal</th>
                        <th class="col-1">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengkajian as $pengkajian)
                    <tr>
                        <td>{{$pengkajian->pasien_id}}</td>
                        <td>{{$pengkajian->pasien->nama_pasien}}</td>
                        <td>{{$pengkajian->tanggal}}</td>
                        <td class="text-center">
                            <a class="btn btn-info btn-sm"
                                href="{{ route('pengkajian.show',$pengkajian->id)}}">Detail</a></a>
                            <a class="btn btn-info btn-sm"
                                href="{{ route('implementasi.edit',$pengkajian->id)}}">Implementasi</a></a>
                            <a class="btn btn-info btn-sm"
                                href="{{ route('evaluasi.show',$pengkajian->id)}}">Evaluasi</a></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection