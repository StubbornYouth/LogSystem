<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\User;

class Group extends Model
{
    protected $table = 'email_group';

    protected $fillable = ['name','commit','create_id','users','group_head'];

    //一个组有对应多个用户
    public function users(){
    	return $this->belongsToMany(User::class,'members','group_id','user_id');
    }
}
