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
                            <p>{{$info}} - {{$dbnic->identi($info)}}</p>
                        </td>
                        <td>
                            {{$mytime = Carbon\Carbon::now();}}
                        </td>
                        <td>
                            <input name="riwayat_penyakit_terdahulu" type="text" class="form-control" required>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </div>
    </div>

</div>
@endsection