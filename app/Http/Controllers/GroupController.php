<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GroupRequest;
use App\Handlers\ImageUploadHandler;
use App\Http\Models\Group;
use App\Http\Models\User;
use App\Http\Models\Log;
use Auth;

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
    	$group=Group::create($request->all());
        //更新用户与组的中间表
        $group->getUsers()->sync($request->create_id, false);
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
        $this->authorize('update', $group);
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
        $this->authorize('show', $group);
        $logs=$this->showLogs($group);
        return view('groups.show',compact('group','logs'));
    } 
    //组用户列表显示
    public function showUsers(Group $group){
        $this->authorize('show', $group);
        $users=$group->getUsers()->paginate(10);
        return view('groups.show_users',compact('group','users'));
    }

    //添加成员
    public function addUser(Request $request,Group $group){
        //检索成员
        if(empty($request->name)){
            session()->flash('danger','用户名不能为空');
            return redirect()->back();
        }
        $user=User::where('name',$request->name)->first();
        if(!$user){
            session()->flash('danger','很抱歉,未找到该用户');
            return redirect()->back();
        }
        $group->getUsers()->sync([$user->id],false);
        session()->flash('success','用户已成功添加');
        return redirect()->back();
    }

    //删除成员
    public function delUser(Group $group,User $user){
        $this->authorize('update', $group);
        $group->getUsers()->detach($user->id);
        Log::where(['group_id'=>$group->id,'user_id'=>$user->id])->delete();
        session()->flash('success','成功将用户'.$user->name.'移出组!');
        return redirect()->route('groups.show_users',$group->id);
    }

    //离开组
    public function leaveGroup(Group $group){
        $this->authorize('show', $group);
        Auth::user()->groups()->detach($group->id);
        session()->flash('success','成功退出组'.$group->name);
        return redirect()->route('home');
    }

    //删除组
    public function destroy(Group $group){
        $this->authorize('update', $group);
        $name=$group->name;
        $users=$group->getUsers()->allRelatedIds()->toArray();
        $group->getUsers()->detach($users);
        Log::where('group_id',$group->id)->delete();
        Group::where('id',$group->id)->delete();  
        session()->flash('success','成功删除组'.$name);
        return redirect()->route('home');
    }

    //获取用户组日志信息
    protected function showLogs(Group $group){
        $logs=Log::where(['group_id'=>$group->id,'user_id'=>Auth::user()->id])->orderBy('updated_at','desc')->paginate(10);
        return $logs;
    }
}
