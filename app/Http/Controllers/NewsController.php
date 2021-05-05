<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{
    public function ShowAllNews(){
        return view("layout.getnews");
    }

    public function GetNews(){
        $news = News::all()->toArray();
        $allnews = [];
        $counter = 0;
        foreach($news as $data){

            $allnews[$counter][0] = $data["id"];
            $allnews[$counter][1] = $data["news_image"];
            $allnews[$counter][2] = $data["news_title"];
            $counter++;
        }
        return json_encode($allnews);
    }

    public function ShowNews($id){
        $news = News::where("id", "=", $id)->get();
        return view("layout.editnews")
                ->with("data", [
                    "news" => $news
                ]);

    }

    public function CreateNews(){
        $id = News::create([
            "news_title" => "News",
            "news_image" => "noimage.jpg",
            "news_url" => ""
        ])->id;
        return redirect("/news/shownews/" . $id);
    }

    public function UpdateNews(Request $request){
        $last = News::where("id", "=", $request->id)->get()->toArray();
        $file = $request->file('news_image');
        $filename = "none";
        if($file){
            if($last[0]["news_image"] != "noimage.jpg"){
                unlink("img/news/" . $last[0]["news_image"]);
            }
            $file->move("img/news", $file->getClientOriginalName());
            $filename = $file->getClientOriginalName();
        }
        $data = News::where("id", "=", $request->id)
                    ->update([
                        "news_title" => $request->news_title,
                        "news_url" => $request->news_url,
                        "news_image" => $filename
                    ]);
        if($data){
            echo json_encode([
                "alert" => "News Updated!",
                "status" => "success"
            ]);
        }else{
            echo json_encode([
                "alert" => "Error on updating",
                "status" => "danger"
            ]);
        }
    }

}
