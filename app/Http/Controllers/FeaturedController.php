<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Featured;

use Auth;

class FeaturedController extends Controller
{

    private function fetch_data(){
        $featured = Featured::orderBy("id", "desc")->get()->toArray();
        $allfeatured = [];
        $counter = 0;
        foreach($featured as $data){
            $allfeatured[$counter][0] = '<div>' . $data["id"] . '</div>';
            $allfeatured[$counter][1] = '<div contenteditable class="update" data-id="'.$data["id"].'" data-column="featured_link">' . $data["featured_link"] . '</div>';
            $allfeatured[$counter][2] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$data["id"].'">Delete</button>';
            $counter++;
        }
        $output = array(
            "draw" => 1,
            "recordsTotal" => count($featured),
            "recordsFiltered" => count($featured),
            "data" => $allfeatured,
        );
        return json_encode($output);
    }

    public function AllFeatured(){
        return view("layout.getfeatured");
    }

    public function GetFeatured(){
        return $this->fetch_data();
    }

    public function CreateFeatured(Request $request){
        $id = Featured::create($request->except("_token"))->id;
        if($id){
            echo "Link Added!";
        }
    }

    public function UpdateFeatured(Request $request){
        $data = Featured::where("id", "=", $request->id)->update([
            $request->column_name => $request->value
        ]);
        if($data){
            echo "Link Updated!";
        }
    }

    public function DeleteFeatured(Request $request){
        $data = Featured::where("id", "=", $request->id)->delete();
        if($data){
            echo "Link Deleted!";
        }
    }
}
