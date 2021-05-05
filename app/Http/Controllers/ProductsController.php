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
            $products = Products::all()->toArray();
            $allproducts = [];
            $counter = 0;
            foreach($products as $data){
                $image = Images::where("product_id", "=", $data["id"])
                                ->get()->toArray();
                $allproducts[$counter][0] = $data["id"];
                $allproducts[$counter][1] = $image[0]["image_source"];
                $allproducts[$counter][2] = $data["product_name"];
                $allproducts[$counter][3] = "";
                $counter++;
            }
            return json_encode($allproducts);
        }else{
            return redirect(\URL::previous());
        }
    }

    public function ShowProduct($id){
        $product = Products::where("id", "=", $id)->get()->toArray();
        $product[0]["images"] = Images::where("product_id", "=", $id)->get()->toArray();
        return view("layout.editproduct")->with("data", [
            "product" => $product
        ]);
    }

    public function UpdateProduct(Request $request){
        // dd($request);
        $data = Products::where("id", "=", $request->id)
                ->update([
                    "product_name" => $request->p_name,
                    "product_type" => $request->p_type,
                    "product_ribbon" => $request->p_ribbon == null ? " " : $request->p_ribbon,
                    "product_description" => $request->p_description,
                    "product_discount" => $request->p_discount,
                    "product_sale_price" => $request->p_sale_price,
                    "product_quantity_in_units" => $request->p_quantity_in_units,
                    "product_base_unit" => $request->p_base_unit,
                    "product_price" => $request->p_price
                ]);
        if($data){
            echo json_encode([
                "alert" => "Product Updated!",
                "status" => "success"
            ]);
        }else{
            echo json_encode([
                "alert" => "Error on updating",
                "status" => "danger"
            ]);
        }
    }   


    public function CreateProduct(Request $request){
        $newproduct = new Products;
        $newproduct->product_name = "New Product";
        $newproduct->product_type = "";
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
        foreach($request->product_id as $id){
            Products::where("id", "=", $id)->delete();
        }
        return json_encode([
            "status" => "success",
            "msg" => "Product Deleted!"
        ]);
    }   
}
