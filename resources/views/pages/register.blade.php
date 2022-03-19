@extends('layouts.log')

@section('content')

<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-5  col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                            </div>
                            <form class="user" action='\register-user' method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control form-control-user" id="name"
                                        placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="email"
                                        placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <select name="role" class="custom-select" id="inputGroupSelect01">
                                        <option value="Kepala Perawat">Kepala Perawat</option>
                                        <option value="Rekam Medik">Rekam Medik</option>
                                        <option value="Perawat">Perawat</option>
                                    </select>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection