<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
     public function __construct()
    {
        $this->middleware('admin');
    }


    public function index(){

    	$title = "Dasboard";

    	return view('AdminPages.index')->with('title', $title);
    }



    
}
