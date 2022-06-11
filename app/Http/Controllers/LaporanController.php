<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\Pasien;
// use Barryvdh\DomPDF\PDF;
use App\Models\Pengkajian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.laporan.laporan_pasien', [
            'pasien' => Pasien::all()
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
        $notin = Evaluasi::all('pengkajian_id');
        $pengkajian = Pengkajian::where('pasien_id', $id)
            ->whereIn('id', $notin)->get();
        return view('pages.laporan.list_laporan', [
            'pengkajian' => $pengkajian
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
        return view('pages.laporan.cetak_laporan', [
            'pengkajian' => Pengkajian::where('id', $id)->first()
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengkajian = Pengkajian::where('id', $id)->first();

        $data = [
            'pengkajian' => $pengkajian
        ];

        // $pdf = PDF::loadview('pages.laporan.pdf_laporan', $data);

        $pdf = PDF::loadView('pages.laporan.pdf_laporan', $data);
        // return $pdf->stream();
        $pdf->save('laporan.pdf');
        return $pdf;
        // return $pdf->download('laporan.pdf');
    }

    public function cetak_pdf($id)
    {
    }
}
