<?php

namespace App\Http\Controllers;
use View;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerController(Request $request) {
        switch ($request->method()) {
            case 'POST':
                $rules = array(
                    'f_name' => 'required|string',
                    'l_name' => 'required|string',
                    'username' => 'required|alphaNum|min:3',
                    'email'    => 'required|email', // make sure the email is an actual email
                    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
                );
                $validator = Validator::make($request->all(),$rules);
                if ($validator->fails()) {
                    return redirect('register')
                    ->withInput()
                    ->withErrors($validator);
                }
                else{
                    $data = $request->input();
                    try{
                        User::create($request->merge([
                            'password' => Hash::make($data["password"]),
                        ])->all());
                        return redirect('login')->withInput($request->input())->with([
                            'msg' => 'User is Registered!.',
                            'status' => 'success'
                        ]);
                    }
                    catch(Exception $e){
                        return Redirect::back()>withInput($request->input())->with([
                            'msg' => 'Error On Some Fields!',
                            'status' => 'danger'
                        ]);
                    }
                }
                break;
    
            case 'GET':
                if(Auth::check()){
                    return redirect('dashboard');
                }else{
                    return View::make('register');
                }
                break;
    
            default:
                // invalid request
                break;
        }
    }
}
