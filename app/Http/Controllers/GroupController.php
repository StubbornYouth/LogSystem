<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GroupRequest;
use App\Http\Models\Group;

class GroupController extends Controller
{
    //创建组视图
    public function create(){
    	return view('groups.create');
    }

    //提交保存
    public function store(GroupRequest $request){
    	Group::create($request->all());
    	session()->flash('success','恭喜你！邮件组创建成功！');
    	return redirect()->route('users.show',$request->create_id);
    }

    
}