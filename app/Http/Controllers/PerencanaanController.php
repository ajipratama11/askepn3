<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Diagnosa;
use App\Models\PasienNic;
use App\Models\PasienNoc;
use App\Models\RencanaNic;
use App\Models\TujuanNoc;
use Illuminate\Http\Request;

class PerencanaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->session()->get('diagnosa');
        $pid = $request->session()->get('pengkajian_id');
        $diagnosa = Diagnosa::where('id',$id)->first();
        $noc = TujuanNoc::where('diagnosa_id',$id)->get();
        $nic = RencanaNic::where('diagnosa_id',$id)->get();
        return view('pages.perencanaan.perencanaan',[
            'diagnosa' => $diagnosa,
            'noc'=> $noc,
            'nic'=> $nic,
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
        
        $request->merge([ 
            'noc' => implode(',', (array) $request['noc'])
        ]);
        $request->merge([ 
            'nic' => implode(',', (array) $request['nic'])
        ]);
        $pid = $request->session()->get('pengkajian_id');
        $did = $request->session()->get('diagnosa');
        $request['pengkajian_id'] = $pid;
        $request['diagnosa_id'] = $did;
        PasienNoc::create($request->all());
        $nic = PasienNic::create($request->all());
    
        if ($nic)
        {
            return redirect()
                ->route('pengkajian.index');
        }
        else
        {
            return redirect()
                ->back();
                
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
