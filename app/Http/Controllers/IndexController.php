<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Group;
use App\Handlers\PageHandler;
use Auth;

class IndexController extends Controller
{
	public function __construct(){
		$this->middleware('auth',[]);
	}
    //主页
    public function home(PageHandler $page){
    	$perPage=$page->page('email_group',[['create_id',Auth::user()->id]]);
        $allPage=Auth::User()->groups->toArray();
        $allPage=$page->allPage($allPage);
    	return view('static_pages.home',compact('allPage','perPage'));
    }

    //个人创建替换页
    public function perPage(PageHandler $page){
    	$perPage=$page->page('email_group',[['create_id',Auth::user()->id]]);
    	return view('page.perPage',compact('perPage'));
    }

    //所有加入组替换页
     public function allPage(PageHandler $page){
        $data=Auth::User()->groups->toArray();
        $allPage=$page->allPage($data);
        return view('page.allPage',compact('allPage'));
    }
}
