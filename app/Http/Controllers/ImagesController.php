<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Images;

class ImagesController extends Controller
{

    public function GetImages(Request $request){
        $images = Images::where("product_id", "=", $request->id)
                        ->get()
                        ->toArray();
        echo json_encode($images);
    }

    public function AddImage(Request $request){
        Images::where([
            ["product_id", "=", $request->id],
            ["image_source", "=", "noimage.png"]
        ])->delete();
        $file = $request->file('file');
        if($file){
            $file->move("img/products", $file->getClientOriginalName());
            $image = new Images();
            $image->image_source = $file->getClientOriginalName();
            $image->product_id = $request->id;
            $image->save();
            echo "Updated!";
        }
        

    }

    public function RemoveImage(Request $request){
        $image_name = Images::where("product_id", "=", $request->product_id)->get()->toArray();
        if(count($image_name) == 1){
            Images::create([
                "image_source" => "noimage.png",
                "product_id" => $request->product_id
            ]);
        }
        if(!$image_name[0]["image_source"] == "noimage.png"){
            unlink("img/products/" . $image_name[0]["image_source"]);
        }
        Images::where("id", "=", $request->id)->delete();
    }

}
