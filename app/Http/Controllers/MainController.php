<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Images;
use App\Models\News;

class MainController extends Controller
{
    public function index(){
        $products = Products::get(["*"])->toArray();
        $news = News::paginate(2);
        foreach($products as $index => $product){
            $products[$index]["images"] = Images::where("product_id", "=", $product["id"])
                                        ->get()->toArray();
        }
        return view("welcome")->with("data", [
            "products" => $products,
            "news" => $news
        ]);
    }
}
