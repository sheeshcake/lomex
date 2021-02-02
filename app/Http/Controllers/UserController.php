<?php

namespace App\Http\Controllers;
use View;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function showDashboard(Request $request){
        switch ($request->method()) {
            case 'POST':
                if($request->get('p') == "getproducts"){
                    
                }
                break;
    
            case 'GET':
                if($request->get('p') == "getproducts"){
                    $products = Products::select('*')
                                ->join('category','products.category_id', "=", "category.id")
                                ->get()->toArray();
                    return view('home', ['products' => $products]);
                }else if($request->get('p') == "prosts"){
                    
                }
                else{
                    return view('home');
                }
                break;
    
            default:
                // invalid request
                break;
        }
    }

    public function showHello(){
        return "Hello!";
    }

    public function logout(Request $request){
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(\URL::previous());
    }
}
