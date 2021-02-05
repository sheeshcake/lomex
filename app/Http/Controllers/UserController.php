<?php

namespace App\Http\Controllers;
use View;
use App\Models\Products;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    public function deleteProducts(Request $request){
        switch ($request->method()) {
            case 'POST':
                if($request->ajax()){
                    $data = [];
                    foreach ($request->input()["product_id"] as &$value) {
                        $images = Images::where('product_id', $value)->delete();
                        $products = Products::where('id', $value)->delete();
                        if ($products && $images){
                            $data=[
                                'status'=>'success',
                                'msg'=>'Product Deleted!'
                            ];
                        }else{
                            $data=[
                                'status'=>'danger',
                                'msg'=>'Error Deleting Product!'
                            ];
                            break;
                        }
                    }
                    return $data;
                }else{
                    return redirect(\URL::previous());
                }
                break;
            default:
                return redirect(\URL::previous());
                break;
        }
    }
    public function createProduct(Request $request){
        $newproduct = new Products;
        $newproduct->product_name = "New Product";
        $newproduct->product_ribbon = "";
        $newproduct->product_description = "";
        $newproduct->product_discount = "0";
        $newproduct->product_sale_price = "0";
        $newproduct->product_quantity_in_units = "0";
        $newproduct->product_base_unit = "0";
        $newproduct->product_price = "0";
        $newproduct->category_id = 1;
        $newproduct->brand_id = 1;
        $newproduct->save();
        $newimage = new Images;
        $newimage->image_source = "noimage.png";
        $newimage->product_id = $newproduct->id;
        $newimage->save();
        $products = Products::select('*')
            ->join('category','products.category_id', "=", "category.id")
            ->join('images', 'images.product_id', "=", "products.id")
            ->where("products.id", "=", $newproduct->id)
            ->get()->toArray();
        return redirect('dashboard?p=editproduct&id=' . $newproduct->id)->with('products', $products);
    }
    public function updateProduct(Request $request){
        switch ($request->method()) {
            case 'POST':
                if($request->ajax()){
                    $data = $request->input();
                    if($data["p_description"] == NULL){
                        $data["p_description"] = "";
                    }
                    if($data["p_ribbon"] == NULL){
                        $data["p_ribbon"] = "";
                    }
                    $products = Products::where('id', $data["id"])
                    ->update([
                        'product_name' => $data["p_name"],
                        'product_ribbon' => $data["p_ribbon"],
                        'product_description' => $data["p_description"],
                        'product_discount' => $data["p_discount"],
                        'product_sale_price' => $data["p_sale_price"],
                        'product_quantity_in_units' => $data["p_quantity_in_units"],
                        'product_base_unit' => $data["p_base_unit"],
                        'product_price' => $data["p_price"]
                    ]);
                    if($products){
                        $d=[
                            'status'=>'success',
                            'msg'=>'Product Updated!'
                        ];
                        return $d;
                    }else{
                        $d=[
                            'status'=>'success',
                            'msg'=>'Error Updating Product!'
                        ];
                        return $d;
                    }
                }else{
                    return redirect(\URL::previous());
                }
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
                $allproducts[$counter][0] = $data["product_id"];
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
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(\URL::previous());
    }
}
