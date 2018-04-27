<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\User;

class Group extends Model
{
    protected $table = 'email_group';

    protected $fillable = ['name','commit','create_id','group_head'];

    //一个组有对应多个用户
    public function getUsers(){
    	return $this->belongsToMany(User::Class,'members','group_id','user_id')->withTimestamps();
    }
}
