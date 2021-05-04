<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Images;

class ProductDetailsController extends Controller
{
    public function GetProductDetails($id){
        $product = Products::where("id", "=", $id)->get();
        $images = Images::where("product_id", "=", $id)->get();
        return view('layout.product-details')->with("data", [
            "product" => $product,
            "images" => $images
        ]);
    }
}
