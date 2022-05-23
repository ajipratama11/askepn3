@extends('layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Perencanaan</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Perencanaan Pasien </h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data"
                action="{{ route('perencanaan.store') }}">
                @csrf
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-1">Diagnosa</th>
                            <th class="col-1">NOC</th>
                            <th class="col-1">NIC</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <p> Nama Diagnosa : {{$diagnosa->nama_diagnosa}}</p>
                                <p> Definisi : {{$diagnosa->definisi_diagnosa}}</p>
                            </td>
                            <td>
                                <p> Setelah dilakukan tindakan
                                    keperawatan selama 
                                    <input name="hari" type="number" style="width: 50px;" required> 
                                    hari. 
                                    {{$diagnosa->nama_diagnosa}} dengan kriteria: </p>
                                <div class="custom-control custom-checkbox">
                                    @foreach ($noc as $noc)
                                    <div class="col-lg-12 mt-2">
                                        <input name="noc[]" type="checkbox" class="custom-control-input"
                                            id="{{$noc->id}}{{$noc->identifikasi_noc}}" value="{{$noc->id}}">
                                        <label class="custom-control-label"
                                            for="{{$noc->id}}{{$noc->identifikasi_noc}}">
                                            {{$noc->identifikasi_noc}}{{$noc->id}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <p>{{$diagnosa->nama_diagnosa}} Management</p>
                                <div class="custom-control custom-checkbox">
                                    @foreach ($nic as $nic)
                                    <div class="col-lg-12 mt-2">
                                        <input name="nic[]" type="checkbox" class="custom-control-input"
                                            id="{{$nic->id}}{{$nic->identifikasi_nic}}"
                                            value="{{$nic->id}}">
                                        <label class="custom-control-label"
                                            for="{{$nic->id}}{{$nic->identifikasi_nic}}">{{$nic->identifikasi_nic}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>

</div>
@endsection