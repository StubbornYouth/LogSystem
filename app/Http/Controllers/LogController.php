<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Log;
use App\Http\Models\Group;
use App\Http\Requests\LogRequest;
use App\Handlers\ImageUploadHandler;
use Auth;

class LogController extends Controller
{
    //新建日志页
    public function create(Group $group,Log $log){
    	//权限控制
        if($log->id){
           $this->authorize('update',$log);
        }
        else{
    	   $this->authorize('show', $group);
        }
    	return view('logs.create',compact('group','log'));
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

    //编辑器图片上传
    public function uploadImg(Request $request,ImageUploadHandler $uploader){
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($request->upload_file, 'logs', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }

    //日志更新
    public function update(LogRequest $request,Log $log){
        //整合数据
        if(!empty($request->title)){
            $log->title = $request->title;
        }
        $log->content = $request->content;
        $log->save();
        session()->flash('success','更新日志成功!');
        return redirect()->route('groups.show',$log->group_id);
    }

    //日志删除
    public function delete(Log $log){
        $id=$log->group_id;
        $this->authorize('update',$log);
        $log->delete();
        session()->flash('success','删除日志成功!');
        return redirect()->route('groups.show',$id);
    }
}
