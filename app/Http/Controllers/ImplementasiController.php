<?php

namespace App\Http\Controllers;

use App\Models\Implementasi;
use App\Models\PasienNic;
use App\Models\PasienNoc;
use App\Models\Pengkajian;
use App\Models\RencanaNic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ImplementasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $implementasi = Implementasi::where('pengkajian_id', $id)->get();

        return view('pages.implementasi.list_implementasi', [
            'implementasi' => $implementasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // $id = $request->session()->get('diagnosa');
        $pengkajian = Pengkajian::where('id', $id)->first();
        $dbnic = PasienNic::where('pengkajian_id', $pengkajian->id)->first();
        $nic = $dbnic->nic;

        return view('pages.implementasi.implementasi', [
            'pengkajian' => $pengkajian,
            'nic' => $nic,
            'dbnic' => $dbnic,
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

        $data = $request->all();
        $nics = $data['nic'];
        $kets = $data['keterangan'];
        foreach ($nics as $key => $input)
        {
            $bahasa = new Implementasi();
            $bahasa->nic = isset($nics[$key]) ? $nics[$key] : '';
            $bahasa->keterangan = isset($kets[$key]) ? $kets[$key] : '';
            $bahasa->tanggal = Carbon::now();
            $bahasa->pengkajian_id = $id;
            $bahasa->save();
        };
        return redirect()->route('pengkajian.index');
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
