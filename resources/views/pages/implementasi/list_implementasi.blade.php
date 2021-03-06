@extends('layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Implementasi</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Implementasi</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="col-1">Standar Intervensi</th>
                        <th class="col-1">Tanggal</th>
                        <th class="col-1">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($implementasi as $implementasi)
                    <tr>
                        <td>{{$implementasi->identi($implementasi->nic)}}</td>
                        <td>{{$implementasi->tanggal}}</td>
                        
                        <td>{{$implementasi->keterangan}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection