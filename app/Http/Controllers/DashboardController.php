<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
    }

    public function ShowDashboard(Request $request){
        return view("layout.dashboard");
    }
}
