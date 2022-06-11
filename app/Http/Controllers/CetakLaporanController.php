<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Evaluasi;
use App\Models\Implementasi;
use Carbon\Carbon;
use App\Models\Pasien;
use App\Models\PasienNic;
use App\Models\PasienNoc;
use App\Models\Pengkajian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = 10;
        $pengkajian = Pengkajian::where('id', $id)->first();

        $data = [
            'pengkajian' => $pengkajian
        ];

        // $pdf = PDF::loadview('pages.laporan.pdf_laporan', $data);

        $pdf = PDF::loadView('pages.laporan.pdf_laporan', $data);
        // return $pdf->stream();
        $pdf->save('laporan.pdf');
        return $pdf;
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

        $pengkajian = Pengkajian::where('id', $id)->first();
        $pasien = Pasien::where('id', $pengkajian->pasien_id)->first();
        $dbnic = PasienNic::where('pengkajian_id', $id)->first();
        $dbnoc = PasienNoc::where('pengkajian_id', $id)->first();
        $diagnosa = Diagnosa::where('id', $dbnic->diagnosa_id)->first();
        $evaluasi = Evaluasi::where('pengkajian_id', $id)->first();
        $implementasi = Implementasi::where('pengkajian_id', $id)->get();
        $end_date = \Carbon\Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $pengkajian->created_at
        )->format('H:i');
        $eva_date = \Carbon\Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $evaluasi->created_at
        )->format('Y-m-d');

        return view('pages.laporan.pdf_laporan', [
            'pengkajian' =>  $pengkajian,
            'pasien' => $pasien,
            'time' => $end_date,
            'dbnic' => $dbnic,
            'dbnoc' => $dbnoc,
            'diagnosa' => $diagnosa,
            'evaluasi' => $evaluasi,
            'implementasi' => $implementasi,
            'date' => $eva_date,
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
        //
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
        //
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
