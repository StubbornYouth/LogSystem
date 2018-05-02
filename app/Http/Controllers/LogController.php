<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Log;
use App\Http\Models\Group;
use App\Http\Requests\LogRequest;
use Auth;

class LogController extends Controller
{
    //新建日志页
    public function create(Group $group){
    	//权限控制
    	$this->authorize('show', $group);
    	return view('logs.create',compact('group'));
    }
	//保存提交
    public function store(LogRequest $request,Group $group,Log $log){
    	//整合数据
    	if(!empty($request->title)){
    		$log->title = $request->title;
    	}
    	$log->content = $request->content;
        $log->user_id = Auth::id();
        $log->group_id = $group->id;
        $log->save();
        session()->flash('success','提交日志成功!');
        return redirect()->route('groups.show',$group->id);
    }
}
