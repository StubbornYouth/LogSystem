<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Models\Group;
use App\Http\Models\User;
use Mail;

class SendLogEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emails;
    protected $data;
    protected $group_name;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($to,$data,$group_name)
    {
        $this->emails=$to;
        $this->data=$data;
        $this->group_name=$group_name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //发送内容视图
        $view="emails.logSend";
        //获取组中成员id
        //获得组中所有成员日志信息

        //传递的数据
        $data=$this->data;
        //接收者的邮箱
        $to=$this->emails;
        $subject='组'.$this->group_name."的每日日志汇总邮件";
        $status = Mail::send($view,['data'=>$data,'group_name'=>$this->group_name],function($msg) use ($to,$subject){
           foreach($to as $t){
                $msg->to($t['email'], $t['name'])->subject($subject);
            }
            
        });
    }
}
