<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionController extends Controller
{
	public function __construct(){
		//对未登录用户的权限控制
		$this->middleware('guest',[
			'only' => ['create']
		]);
	}

    //登录页面
    public function create(){
    	return view('sessions.login');
    }
    //提交登录
    public function store(Request $request){
    	//验证
    	$info=$this->validate($request,[
    		'email' => 'required|email|max:50',
    		'password' => 'required'
    	]);
    	//判断用户登录信息是否匹配
    	if(Auth::attempt($info,$request->has('remember'))){
    		//判断用户是否激活
    		if(Auth::user()->activated){
    			session()->flash('success','欢迎回来!');
    			return redirect()->intended(route('users.show',[Auth::user()]));
    		}
    		else{
    			Auth::logout();
    			session()->flash('danger','当前账号还未激活,请前往邮箱确认!');
    			return redirect()->back();
    		}
    	}else{
    		session()->flash('danger','啊哦,您的邮箱与密码不匹配!');
    		return redirect()->back();
    	}
    }
    //退出
    public function destroy(){
    	Auth::logout();
    	return redirect()->route('login');
    }
}
