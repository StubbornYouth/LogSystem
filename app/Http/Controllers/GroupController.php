<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GroupRequest;
use App\Handlers\ImageUploadHandler;
use App\Http\Models\Group;

class GroupController extends Controller
{
    public function __construct(){
        $this->middleware('auth',[]);
    }
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

    //编辑
    public function edit(Group $group){
        $this->authorize('update', $group);
        return view('groups.edit',compact('group'));
    }

    //更新
    public function update(GroupRequest $request,ImageUploadHandler $upload,Group $group){
        $data=['name'=>$request->name,'commit'=>$request->commit];
        if($request->group_head){
            $result=$upload->save($request->group_head,'group_email',$group->id,200);
            if($result){
                $data['group_head']=$result['path'];
            }
        }
        $group->update($data);
        session()->flash('success','更新组信息成功！');
        return redirect()->route('home');
    }
    //展示
    public function show(Group $group){
        return view('groups.show',compact('group'));
    }
}
