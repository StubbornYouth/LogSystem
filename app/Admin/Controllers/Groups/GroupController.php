<?php

namespace App\Admin\Controllers\Groups;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Group;

class GroupController extends Controller
{
    public function index(){
        $groups=Group::orderBy('created_at', 'desc')->paginate(10);
        return view('admin::groups.groups',compact('groups'));
    }
}
