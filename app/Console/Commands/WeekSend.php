<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Models\Group;
use App\Http\Models\Log;
use App\Http\Models\User;
use App\Jobs\SendWeekEmail;

class WeekSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:send-week-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '周日志发送';

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
         //业务逻辑
        $groups=Group::all();
        foreach($groups as $group){
            $to=[];
            $data=[];
            //获取一周前时间戳
            $befWeek=strtotime("-1 weeks");
            //邮件信息
            $logs=Log::select('user_id','title','content','created_at')->where('group_id',$group->id)->whereDate('created_at','>',date('Y-m-d',$befWeek))->whereDate('created_at','<=',date('Y-m-d'))->orderBy('user_id','asc')->get();
            if(count($logs)>0){
                foreach($logs as $log){
                    $name=User::where('id',$log->user_id)->value('real_name');
                    $data[$name][]=['title'=>$log->title,'content'=>$log->content,'date'=>$log->created_at];
                }
                //组成员邮箱数据
                foreach($group->getUsers as $user){
                    $to[]=['email'=>$user->email,'name'=>$user->name];
                }
                //组名
                $group_name=Group::where('id',$group->id)->value('name');
                dispatch(new SendWeekEmail($to,$data,$group_name));
            }
            
        }      
    }
}
