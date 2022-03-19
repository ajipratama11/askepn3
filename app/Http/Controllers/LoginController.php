<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {

        return view('pages.login');

    }
    public function register()
    {

        return view('pages.register');

    }

    public function create(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password), 
            // 'password' => $request->password, 
            'role' => $request->role
        ]);

    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        // $user = User::where([
        //     'email'=>$credentials['email'],
        //     'password'=>$credentials['']]);
        if(Auth::attempt($credentials)){
            // if($user = User::where('roles','administrator')){
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            // };
            
        };
        return redirect('login')->with('alert-success', 'Email atau password salah');
    }

    public function logout(Request $request){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
