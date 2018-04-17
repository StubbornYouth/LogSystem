<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;

class UserController extends Controller
{
    //
    public function create(){
    	return view('users.create');
    } 

    public function show(User $user){
    	return view('users.show',compact('user'));
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name' => 'required|min:3|max:10',
    		'email' => 'required|email|unique:users|max:50',
    		'password' => 'required|confirmed|min:6|max:20',
    	]);

    	$user=User::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => bcrypt($request->password)
    	]);
    	session()->flash('success',':)欢迎，你已经注册成功！');
    	return redirect()->route('users.show',[$user]);
    }
}