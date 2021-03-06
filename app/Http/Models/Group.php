<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\User;
use App\Http\Models\Log;

class Group extends Model
{
    protected $table = 'email_group';

    protected $fillable = ['name','commit','create_id','group_head'];

    //一个组有对应多个用户
    public function getUsers(){
    	return $this->belongsToMany(User::class,'members','group_id','user_id')->withTimestamps();
    }

    //一个组对应多篇日志
    public function logs(){
    	return $this->hasMany(Log::class);
    }

    //一个组由一个用户创建
    public function user() {
        return $this->belongsTo(User::class,'create_id');
    }
}
