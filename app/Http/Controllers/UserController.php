<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function showDashboard(){
        return view('home');
    }

    public function logout(Request $request){
    
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('login');
    }
}
