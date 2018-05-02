<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Models\Group;
use App\Http\Models\User;
use App\Http\Models\Log;
use Mail;

class SendLogEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:send-log-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '发送日志邮件';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $groups=Group::all();
        foreach($groups as $group){   
            //发送内容视图
            $view="emails.logSend";
            //获取组中成员id
            $users=$group->getUsers()->allRelatedIds()->toArray();
            //获得组中所有成员日志信息
            $this->getLog($users);
            //传递的数据
            $data=[];
            //接收者的邮箱
            $to=$group->getUsers;
            $subject="测试邮件，不必理会。。";
            $status = Mail::send($view, $data, function($msg) use ($to,$subject){
                foreach($to as $t){
                    $msg->to($t['email'], $t['name'])->subject($subject);
                }
            });
        }
    }

    protected function getData($users){
        $data=[];
        for($i=0,$i<count($users),$i++)
        {
            $user=User::find($users[$i]);
            $logs=getLog($users[$i]);
            $info=['']
            $data[$i]=
        }
    }

    protected function getLog($id){
        $logs=Log::select('title','content')->where('user_id',$id)->whereDate('updated_at',date('Y-m-d'))->orderBy('updated_at','asc')->get();
        return $logs;
    }
}
