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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Diagnosa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-1">No. Pengkajian</th>
                            <th class="col-1">Tanggal</th>
                            <th class="col-1">Nama Dagnosa</th>
                            <th class="col-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengkajian as $pengkajian)
                        <tr>
                            <td>{{$pengkajian->id}}</td>
                            <td>{{$pengkajian->tanggal}}</td>
                            <td>{{$pengkajian->nic($pengkajian->id)}}</td>
                            <td class="text-center">
                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('laporan.edit',$pengkajian->id)}}">Cetak Laporan</a></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection