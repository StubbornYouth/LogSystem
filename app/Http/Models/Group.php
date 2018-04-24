<?php

namespace App\http\models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'email_group';

    protected $fillable = ['name','commit','create_id','users','group_head'];
}
