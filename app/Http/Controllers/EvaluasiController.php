<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Diagnosa;
use App\Models\Evaluasi;
use App\Models\Pengkajian;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.evaluasi.evaluasi', [
            'pasien' => Pasien::where('id', 1)->first(),
            'diagnosa' => Diagnosa::all()
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
        return view('pages.evaluasi.evaluasi', [
            'pengkajian' => Pengkajian::where('id', $id)->first(),
            'diagnosa' => Diagnosa::all()
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
        $input = $request->validate([
            'data_objektif' => 'required',
            'data_subjektif' => 'required',
            'analisis' => 'required',
            'planing' => 'required',
        ]);
        $evaluasi = new Evaluasi();
        $evaluasi->data_objektif = $input['data_objektif'];
        $evaluasi->data_subjektif = $input['data_subjektif'];
        $evaluasi->analisis = $input['analisis'];
        $evaluasi->planing = $input['planing'];
        $evaluasi->pengkajian_id = $id;
        $evaluasi->save($input);

        if ($evaluasi)
        {
            return redirect()
                ->route('pengkajian.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        }
        else
        {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
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
