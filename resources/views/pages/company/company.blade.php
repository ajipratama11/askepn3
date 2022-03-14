@extends('layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pemilik Sistem</h1>
        {{-- <a href="{{ route('company.create') }}" class="btn btn-primary"><i
                class="fas fa-download fa-sm text-white-50"></i> Tambah Perusahaan</a> --}}
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pemilik Sistem</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-1">Nama Pemilik Sistem</th>
                            <th class="col-1">Nama Kontak</th>
                            <th class="col-1">Nomor HP Kontak</th>
                            <th class="col-1">Alamat Surat Elektronik</th>
                            <th class="col-1">Total Program</th>
                            <th class="col-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                        <tr>
                            <td>{{$company->name}}</td>
                            <td>{{$company->contact_name}}</td>
                            <td>{{$company->phone_number}}</td>
                            <td>{{$company->email}}</td>
                            <td>{{$company->program_count($company->companyProgram->user_id ?? 0)}}</td>
                           
                            {{-- <td>{{$company->companyProgram->id}}</td> --}}
                            <td class="text-center">
                                <form action="{{url('company', $company->id)}}" method="POST">
                                        {{-- <a class="btn btn-info btn-sm " href="/company/{{$company->id}}/edit"><i
                                                class="fas fa-fw fa-edit"></i></a> --}}
                                    <a class="btn btn-info btn-sm"
                                        href="/company/{{$company->id}}"><i
                                            class="fas fa-fw fa-info"></i></a></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                            class="fas fa-fw fa-trash-alt"></i></button>
                                </form>
                            </td>
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