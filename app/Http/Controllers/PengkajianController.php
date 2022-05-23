<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use App\Models\Perawat;
use App\Models\Pengkajian;
use App\Models\KajianPasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengkajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengkajian = Pengkajian::get();


        return view('pages.pengkajian.pengkajian', [
            'pengkajian' => $pengkajian
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $pengkajian = Pengkajian::where('id', $id)
            ->first();
        $pasien = Pasien::where('id', $pengkajian->pasien_id)
            ->first();
        $perawat = User::where('id', $pengkajian->perawat_id)->first();
        return view('pages.pengkajian.detail_pengkajian', [
            'pasien' => $pasien,
            'pengkajian' => $pengkajian,
            'perawat' => $perawat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasien = Pasien::where('id', $id)
            ->first();
        $perawat = User::where('role', 'Perawat')->get();
        return view('pages.pengkajian.tambah_pengkajian', [
            'pasien' => $pasien,
            'perawat' => $perawat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'perawat_id' => 'required',
            'ruang' => 'required',
            'tanggal' => 'required',
            'tensi_darah' => 'required',
            'suhu' => 'required',
            'nadi' => 'required',
            'riwayat_penyakit_sekarang' => 'required',
            'riwayat_penyakit_terdahulu' => 'required',
            'keluhan' => 'required',

        ]);
        $input['pasien_id'] = $id;
        $pengkajian = Pengkajian::create($input);

        $request->session()->put('pengkajian_id',$pengkajian->id);

        if ($pengkajian)
        {
            return redirect()
                ->route('diagnosa.index');
        }
        else
        {
            return redirect()
                ->back();
                
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
