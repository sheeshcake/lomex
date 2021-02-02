<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewProducts(){

    }
    public function addProducts(Request $request){
        $data = $request->input();
    }
}
