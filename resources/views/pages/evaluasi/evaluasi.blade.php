@extends('layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Evaluasi</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Evaluasi Pasien</h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('evaluasi.update',$pengkajian->id) }}">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-lg-6">
                        <span class="font-weight-bolder"> No Rekam Medik</span>
                        <p class="font-weight-normal">{{ $pengkajian->pasien->no_rm}}</p>
                    </div>
                    <div class="col-lg-6">
                        <span class="font-weight-bolder"> Nama Pasien </span>
                        <p class="font-weight-normal">{{ $pengkajian->pasien->nama_pasien }}</p>
                    </div>
                    
                    <div class="col-lg-6">
                        <span class="font-weight-bolder"> Data Subjektif</span>
                        <input name="data_subjektif" type="text" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <span class="font-weight-bolder"> Data Objektif</span>
                        <input name="data_objektif" type="text" class="form-control">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <span class="font-weight-bolder"> Analisis</span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="analisis" id="exampleRadios1"
                                value="Teratasi">
                            <label class="form-check-label" for="exampleRadios1">
                                Teratasi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="analisis" id="exampleRadios2"
                                value="Berkurang">
                            <label class="form-check-label" for="exampleRadios2">
                                Berkurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="analisis" id="exampleRadios3"
                                value="Belum Teratasi">
                            <label class="form-check-label" for="exampleRadios3">
                                Belum Teratasi
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <span class="font-weight-bolder"> Planing</span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="planing" id="exampleRadios4"
                                value="Intervensi Dilanjutkan">
                            <label class="form-check-label" for="exampleRadios4">
                                Intervensi Dilanjutkan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="planing" id="exampleRadios5"
                                value="Intervensi Dihentikan">
                            <label class="form-check-label" for="exampleRadios5">
                                Intervensi Dihentikan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="planing" id="exampleRadios6"
                                value="Kaji Ulang">
                            <label class="form-check-label" for="exampleRadios6">
                                Kaji Ulang
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection