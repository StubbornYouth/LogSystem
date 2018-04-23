<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Group;
use Auth;

class Indexcontroller extends Controller
{
	public function __construct(){
		$this->middleware('auth',[]);
	}
    //主页
    public function home(){
    	$data=Group::where('create_id',Auth::user()->id)->paginate(10);
    	return view('static_pages.home',compact('data'));
    }
}
