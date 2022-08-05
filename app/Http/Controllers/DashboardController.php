<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use App\Models\Evaluasi;
use App\Models\Pengkajian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::all();
        $auth = Auth::user();
        $notin = Evaluasi::all('pengkajian_id');
        $pasien = Pengkajian::whereIn('id', $notin)->count();
        $perawat = Pengkajian::whereNotIn('id', $notin)->count();
        $list_pasien = Pengkajian::whereNotIn('id', $notin)->get();

        return view('pages.dashboard', [
            'user' => $user,
            'auth' => $auth,
            'pasien' => $pasien,
            'perawat' => $perawat,
            'list_pasien' => $list_pasien,
        ]);
    }
}
