<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
    protected $table='logs';
    
    protected $fillable = ['title','content'];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
