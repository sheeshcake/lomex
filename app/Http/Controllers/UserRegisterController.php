<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use View;
use Auth;
use Redirect;
use Hash;

class UserRegisterController extends Controller
{
    public function __construct()
    {   
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:user')->except('logout');
    }

    public function ShowRegister(){
        return view("auth.register", ["url" => "user"]);
    }

    public function DoRegister(Request $request){
        User::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'plain_password' => $request->password
        ]);
        return redirect()->intended("/login");
    }
}
