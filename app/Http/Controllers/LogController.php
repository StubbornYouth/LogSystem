<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Group;

class LogController extends Controller
{
    //
    public function create(Group $group){
    	return view('logs.create',compact('group'));
    }
}
