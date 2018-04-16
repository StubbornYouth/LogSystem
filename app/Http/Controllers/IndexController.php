<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Indexcontroller extends Controller
{
    //
    function home(){
    	return view('static_pages.home');
    }
}
