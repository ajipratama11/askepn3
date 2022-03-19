<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::all();
        $auth = Auth::user();
        return view('pages.dashboard',[
            'user'=>$user,
            'auth'=>$auth
        ]);
    }
}
