<?php

namespace App\Http\Controllers;
use View;
use \stdClass;
use App\Models\Products;
use App\Models\Images;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    
    public function ShowProducts(){
        return view("layout.getproducts");
    }

    public function GetProducts(Request $request){
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

    public function ShowProduct($id){
        $product = Products::join("images", "images.product_id", "=", "products.id")
                        ->where("products.id", "=", $id)->get();
        return view("layout.editproduct")->with("data", [
            "product" => $product
        ]);
    }

    public function UpdateProduct(Request $request){
    }


    public function CreateProduct(Request $request){
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
        return redirect('/products/product/' . $newproduct->id);
    }


    public function DeleteProducts(Request $request){
    }   
}
