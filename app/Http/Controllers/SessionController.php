<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionController extends Controller
{
    //
    public function create(){
    	return view('sessions.login');
    }

    public function store(Request $request){
    	$info=$this->validate($request,[
    		'email' => 'required|email|max:50',
    		'password' => 'required'
    	]);

    	if(Auth::attempt($info)){
    		session()->flash('success','欢迎回来!');
    		return redirect()->route('users.show',[Auth::user()]);
    	}else{
    		session()->flash('danger','啊哦,您的邮箱与密码不匹配!');
    		return redirect()->back();
    	}
    }
}
