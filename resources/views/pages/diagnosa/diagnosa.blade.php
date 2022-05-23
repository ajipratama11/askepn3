@extends('layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Diagnosa</h1>

    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Diagnosa</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('diagnosa.store')}}" id="n4" method="POST">
                @csrf
                <div class="row">
                    @foreach ($diagnosa as $d)
                    <div class="col-lg-6 mt-2">
                        <input type="radio" class="btn-check" name="options-outlined" id="{{$d->id}}" value="{{$d->id}}"
                            onchange="sync(this)">
                        <label class="btn btn-outline-success" for="{{$d->id}}">{{$d->nama_diagnosa}}</label>
                    </div>
                    @endforeach
                </div>
                <input type="hidden" name="diagnosa" id="diagnosa">
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    function sync(el)
        {
        var diagnosa = document.getElementById('diagnosa');
        diagnosa.value = el.value;
        }
</script>
@endsection