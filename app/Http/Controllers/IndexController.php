<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Group;
use App\Handlers\PageHandler;
use Auth;

class Indexcontroller extends Controller
{
	public function __construct(){
		$this->middleware('auth',[]);
	}
    //主页
    public function home(PageHandler $page){
    	$perPage=$page->page('email_group',[['create_id',Auth::user()->id]]);
    	return view('static_pages.home',compact('perPage'));
    }

    //个人创建替换页
    public function perPage(PageHandler $page){
    	$perPage=$page->page('email_group',[['create_id',Auth::user()->id]]);
    	return view('page.perPage',compact('perPage'));
    }
}
