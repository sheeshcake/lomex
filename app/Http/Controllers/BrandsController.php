<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Brand;

class BrandsController extends Controller
{
    public function index(){
        return view("layout.brands");
    }

    public function get(){
        $brand = Brand::orderBy("id", "desc")->get()->toArray();
        $allbrand = [];
        $counter = 0;
        foreach($brand as $data){
            $allbrand[$counter][0] = '<div class="text-dark">' . $data["id"] . '</div>';
            $allbrand[$counter][1] = '<div contenteditable class="update text-dark" data-id="'.$data["id"].'" data-column="brand_name">' . $data["brand_name"] . '</div>';
            $allbrand[$counter][2] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$data["id"].'">Delete</button>';
            $counter++;
        }
        $output = array(
            "draw" => 1,
            "recordsTotal" => count($brand),
            "recordsFiltered" => count($brand),
            "data" => $allbrand,
        );
        return json_encode($output);
    }

    public function create(Request $request){
        $data = Brand::create($request->except("_token"));
        if($data){
            echo "brand Added!";
        }else{
            echo "Error adding brand";
        }
    }

    public function delete(Request $request){
        $data = Brand::where("id", "=", $request->id)->delete();
        if($data){
            echo "brand Deleted!";
        }else{
            echo "Error deleting brand";
        }
    }

    public function update(Request $request){
        $data = Brand::where("id", "=", $request->id)->update(
            [$request->column_name => $request->value]
        );
        if($data){
            echo "brand Updated!";
        }else{
            echo "Error updating brand";
        }
    }
}
