@extends('layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pasien</h1>
        <a href="{{ route('pasien.create') }}" class="btn btn-primary"><i
                class="fas fa-download fa-sm text-white-50"></i> Tambah Pasien</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pasien</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-1">No Rekam Medik</th>
                            <th class="col-1">Nama Pasien</th>
                            <th class="col-1">Alamat</th>
                            <th class="col-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $pasien)
                        <tr>
                            <td>{{$pasien->no_rm}}</td>
                            <td>{{$pasien->nama_pasien}}</td>
                            <td>{{$pasien->alamat}}</td>
                            <td class="text-center">
                                <form action="{{url('pasien', $pasien->id)}}" method="POST">
                                    <a class="btn btn-info btn-sm" href="{{ route('pasien.show',$pasien->id)}}"><i
                                            class="fas fa-fw fa-info"></i></a></a>
                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('pengkajian.edit',$pasien->id)}}">Pengkajian</a></a>
                                    {{-- @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                            class="fas fa-fw fa-trash-alt"></i></button> --}}
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
    var table = $('#dataTable').DataTable({
        "order": [],
    //    dom: 'lfrtip'
    });z
});
</script>
@endsection