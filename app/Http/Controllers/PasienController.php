<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.pasien.pasien',[
            'pasien' => Pasien::orderBy('id','desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pasien.create_pasien');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'no_rm'=>'required',
            'nik' => 'required',
            'nama_pasien' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
        ]);
        $pasien = Pasien::create($input);

        if ($pasien) {
            return redirect()
                ->route('pasien.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
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
        $pasien = Pasien::where('id',$id)
        ->first();
        
        return view('pages.pasien.detail_pasien', [
          'pasien' => $pasien
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
        $pasien = Pasien::where('id',$id)
        ->first();
        
        return view('pages.pasien.edit_pasien', [
          'pasien' => $pasien
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
            'no_rm'=>'required',
            'nik' => 'required',
            'nama_pasien' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
        ]);
        $pasien = Pasien::where('id',$id)->first();
        $pasien->no_rm = $input['no_rm'];
        $pasien->nik = $input['nik'];
        $pasien->nama_pasien = $input['nama_pasien'];
        $pasien->tempat_lahir = $input['tempat_lahir'];
        $pasien->tanggal_lahir = $input['tanggal_lahir'];
        $pasien->jenis_kelamin = $input['jenis_kelamin'];
        $pasien->alamat = $input['alamat'];
        $pasien->agama = $input['agama'];

        $pasien->save($input);

        if ($pasien) {
            return redirect()
                ->route('pasien.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
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
