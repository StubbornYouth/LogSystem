<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'email_group';

    protected $fillable = ['name','commit','create_id','users','group_head'];
}
