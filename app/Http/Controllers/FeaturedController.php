<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Featured;

use Auth;

class FeaturedController extends Controller
{
    public function AllFeatured(){
        $featured = Featured::all();
        dd($featured);
    }
}
