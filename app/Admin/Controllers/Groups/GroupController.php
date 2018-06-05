<?php

namespace App\Admin\Controllers\Groups;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Group;
use App\Handlers\ImageUploadHandler;

/**
 * @module 组管理
 *
 * Class GroupController
 * @package App\Admin\Controllers\Groups
 */
class GroupController extends Controller
{
    /**
     * @permission 组列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data=$this->screening_conditions(request());
        //with方法 防止N+1问题
        $groups=Group::orderBy('created_at', 'desc')->with('user')->where($data)->paginate(10);
        //配置标题和描述信息
        config(['admin.header'=>'组列表','admin.description'=>'邮件组']);

        return view('admin::groups.groups',compact('groups'));
    }

    /**
     * @permission 修改商品-页面
     *
     * @param Group $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Group $group)
    {
        config(['admin.header'=>'编辑组','admin.description'=>'更改组信息']);
        return view('admin::groups.edit',compact('group'));
    }

    /**
     * @permission 修改商品
     *
     * @param Group $group
     * @param Request $request
     * @param ImageUploadHandler $upload
     * @return \Illuminate\Http\RedirectResponse
     */
    public  function update(Group $group,Request $request,ImageUploadHandler $upload)
    {
        if($request->covers){
            $image=$upload->save($request->covers,'group_email',$group->id,200);
            $group->group_head=$image['path'];
        }
        $group->name=$request->name;
        $group->commit=$request->commit;
        $group->save();

        return redirect()->route('admin::groups.edit',$group->id);
    }

    public function destory(Group $group)
    {
        $group->delete();

        return response()->json(['status'=>1,'message'=>'成功']);
    }

    protected function screening_conditions($request)
    {
        $data=[];
        if($request->get('id')) {
            $data[]= ['id','=',$request->get('id')];
        }

        if($request->get('name')) {
            $data[]= ['name','like',$request->get('name')];
        }

        return $data;
    }
}
