<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use View;
use Redirect;

class UserLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:user')->except('logout');
    }

    public function ShowLogin(){
        return view('auth.login', ['url' => 'user']);
    }

    public function DoLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required|min:6',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('user')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
