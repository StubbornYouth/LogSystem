<?php

namespace App\Http\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;
Use App\Http\Models\Group;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    
    protected $fillable = [
        'real_name','name', 'email', 'password','head'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //用户模型初始化后自动调用
    public static function boot(){
        parent::boot();
        //用户模型创建之前的监听事件
        static::creating(function($user){
            $user->activation_token=str_random(30);
        });
    }
    //重置密码
    public function sendPasswordResetNotification($token){
        $this->notify(new ResetPassword($token));
    }
    //获取用户所关联的组
    public function groups(){
        //多对多关联
        return $this->belongsToMany(Group::Class,'members','user_id','group_id');
    }
    //获取加入组的时间
    public function getRelations(){
        return $this->relations['pivot']->attributes['created_at'];
    }
}
