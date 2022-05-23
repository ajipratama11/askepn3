@extends('layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Perawat</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Perawat</h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('perawat.update',$perawat->id) }}">
                <div class="row">
                    @csrf
                    @method('put')
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Perawat</label>
                            <input name="name" type="text" class="form-control"
                                value="{{$perawat->name}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="custom-select" id="inputGroupSelect01">
                                <option value="Laki-laki" {{ $perawat->jenis_kelamin == 'Laki-laki' ? 'selected' :''
                                    }}>Laki-laki</option>
                                <option value="Perempuan" {{ $perawat->jenis_kelamin == 'Perempuan' ? 'selected' :''
                                    }}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" type="text" class="form-control"> {{$perawat->alamat}}</textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection