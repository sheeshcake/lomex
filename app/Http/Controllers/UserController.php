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
    public function updateProduct(Request $request){
        switch ($request->method()) {
            case 'POST':
                break;
            case 'GET':
                $products = Products::select('*')
                    ->join('category','products.category_id', "=", "category.id")
                    ->join('images', 'images.product_id', "=", "products.id")
                    ->get()->toArray();
                return view('home', ['products' => $products]);
                break;
            default:
                return redirect(\URL::previous());
                break;
        }
    }
    public function getProducts(Request $request){
        if($request->ajax()){
            $products = Products::select('*')
                        ->join('category','products.category_id', "=", "category.id")
                        ->join('images', 'images.product_id', "=", "products.id")
                        ->get()->toArray();
            $allproducts = [];
            $counter = 0;
            foreach($products as $data){
                $allproducts[$counter][0] = $data["id"];
                $allproducts[$counter][1] = $data["image_source"];
                $allproducts[$counter][2] = $data["product_name"];
                $allproducts[$counter][3] = $data["category_name"];
                $counter++;
            }
            return json_encode($allproducts);
        }else{
            return redirect(\URL::previous());
        }
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
                }else if($request->get('p') == "editproduct"){
                    $products = Products::select('*')
                        ->join('category','products.category_id', "=", "category.id")
                        ->join('images', 'images.product_id', "=", "products.id")
                        ->where("products.id", "=", $request->get('id'))
                        ->get()->toArray();
                    return view('home', ['products' => $products]);
                }else if($request->get('p') == "posts"){
                    return view('home');
                }
                else{
                    return view('home');
                }
                break;
    
            default:
                return redirect(\URL::previous());
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
