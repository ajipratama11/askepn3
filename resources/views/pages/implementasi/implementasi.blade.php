@extends('layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Implementasi</h1>
        <a href="{{ route('implementasi.show',$pengkajian->id) }}" class="btn btn-primary"><i
                class="fas fa-download fa-sm text-white-50"></i> Daftar Implementasi</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Implementasi Pasien </h6>
        </div>
        <div class="card-body">
            <span class="font-weight-bolder">Nama Pasien : </span>
            <span class="font-weight-bolder"> {{$pengkajian->pasien->nama_pasien}} </span>
            <br>
            <span class="font-weight-bolder"> No Rekam Medik : </span>
            <span class="font-weight-bolder"> {{$pengkajian->pasien->no_rm}} </span>

            <form method="POST" enctype="multipart/form-data"
                action="{{ route('implementasi.update',$pengkajian->id) }}">
                @csrf
                @method('put')
                <br>
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-1">Standar Intervensi</th>
                            <th class="col-1">Periode</th>
                            <th class="col-1">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(explode(',', $dbnic->nic) as $info)
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input name="nic[]" type="checkbox" class="custom-control-input"
                                        id="{{$dbnic->id($info)}}{{$dbnic->identi($info)}}"
                                        value="{{$dbnic->id($info)}}" required>
                                    <label class="custom-control-label"
                                        for="{{$dbnic->id($info)}}{{$dbnic->identi($info)}}">
                                        {{$dbnic->identi($info)}}</label>
                                </div>
                            </td>
                            <td>
                                {{$mytime = Carbon\Carbon::now();}}
                            </td>
                            <td>
                                <input name="keterangan[]" type="text" class="form-control" required>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>

</div>
@endsection