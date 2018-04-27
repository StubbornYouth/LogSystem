<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;
use App\Http\Models\Group;
use App\Handlers\ImageUploadHandler;
use Auth;
use Mail;

class UserController extends Controller
{
    public function __construct(){
        //登录与未登录权限
        $this->middleware('auth',[
            'except' => ['create','store','confirmEmail'],
        ]);
        $this->middleware('guest',[
            'only' => ['create'],
        ]);
    }

    //注册页面
    public function create(){
    	return view('users.create');
    } 

    //个人信息页面
    public function show(User $user){
    	return view('users.show',compact('user'));
    }

    //提交注册
    public function store(Request $request){
    	$this->validate($request,[
            'real_name' => 'required|max:10|regex:/^[\x{4e00}-\x{9fa5}\w]+$/u',
    		'name' => 'required|min:3|max:20|regex:/^[\x{4e00}-\x{9fa5}\w]+$/u',
    		'email' => 'required|email|unique:users|max:50',
    		'password' => 'required|confirmed|min:6|max:20',
    	]);

    	$user=User::create([
            'real_name' => $request->real_name,
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => bcrypt($request->password)
    	]);
        $this->sendConfirmEmail($user);
        session()->flash('success', '验证邮件已发送到你的注册邮箱上，请注意查收。');
        return redirect()->route('login');
    }
    //邮件发送
    protected function sendConfirmEmail($user){
        $view="emails.confirm";
        $data=compact('user');
        $to=$user->email;
        $subject="感谢注册LogSystem！,请确认你的邮箱。";

        Mail::send($view,$data,function($message) use ($to,$subject){
            $message->to($to)->subject($subject);
        });
    }

    //激活
    public function confirmEmail($token){
        //获取匹配的用户
        $user=User::where('activation_token',$token)->firstOrFail();
        $user->activation_token = null;
        $user->activated = true;
        $user->save();
        Auth::login($user);
        session()->flash('success',':)欢迎，你已经注册成功！');
        return redirect()->route('users.show',[$user]);
    }
    //修改个人信息
    public function edit(User $user){
        //验证用户授权策略
        $this->authorize('update',$user);
        return view('users.edit',compact('user'));
    }

    //提交修改
    public function update(Request $request,ImageUploadHandler $upload,User $user){
        $this->validate($request,[
            'real_name' => 'required|max:10|regex:/^[\x{4e00}-\x{9fa5}\w]+$/u',
            'name' => 'required|min:3|max:10|regex:/^[\x{4e00}-\x{9fa5}\w]+$/u',
            'password' => 'nullable|confirmed|min:6|max:20',
            'head' => 'mimes:jpeg,png,gif|dimensions:min_width=200,min_height=200',
        ]);
        $this->authorize('update',$user);
        $data=['real_name'=>$request->real_name,'name'=>$request->name];
        if(!empty($request->password))
        {
            $data['password']=bcrypt($request->password);
        }
        if($request->head){
            $result=$upload->save($request->head,'head',$user->id,200);
            if($result){
                $data['head']=$result['path'];
            }
        }
        $user->update($data);
        session()->flash('success','更新资料成功!');
        return redirect()->route('users.show',compact('user'));
    }
}
