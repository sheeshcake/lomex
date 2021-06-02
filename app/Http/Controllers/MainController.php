<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Images;
use App\Models\News;
use App\Models\Featured;
use App\Models\Brand;

class MainController extends Controller
{
    public function index(){
        $products = Products::join("brand", "brand.id", "=", "products.brand_id")
                        ->get(["brand.*", "products.*", "products.id as product_id"])->toArray();
        $news = News::orderBy("id", "desc")->paginate(2);
        foreach($products as $index => $product){
            $products[$index]["images"] = Images::where("product_id", "=", $product["product_id"])
                                        ->get()->toArray();
        }
        $featured = Featured::orderBy("id", "desc")->paginate(2);
        return view("welcome")->with("data", [
            "products" => $products,
            "news" => $news,
            "featured" => $featured
        ]);
    }
}
