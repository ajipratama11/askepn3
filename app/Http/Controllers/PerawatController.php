<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perawat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PerawatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.perawat.perawat', [
            'perawat' => User::where('role', 'perawat')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.perawat.create_perawat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        $perawat = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'role' => 'Perawat'
        ]);

        if ($perawat)
        {
            return redirect()
                ->route('perawat.index')
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
        $perawat = User::where('id', $id)
            ->first();

        return view('pages.perawat.edit_perawat', [
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
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);
        $perawat = User::where('id', $id)->first();

        $perawat->name = $input['name'];
        $perawat->jenis_kelamin = $input['jenis_kelamin'];
        $perawat->alamat = $input['alamat'];
        $perawat->save();

        if ($perawat)
        {
            return redirect()
                ->route('perawat.index')
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
        $game = User::findOrFail($id);
        $game->delete();

        return redirect()
            ->route('perawat.index')
            ->with([
                'success' => 'New post has been created successfully'
            ]);
    }
}
