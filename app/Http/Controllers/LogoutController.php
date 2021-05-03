<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    public function logout(Request $request) {
        $this->guard('user')->logout();

        $request->session()->invalidate();
    
        return $this->loggedOut($request) ?: redirect('/');
      }
}
