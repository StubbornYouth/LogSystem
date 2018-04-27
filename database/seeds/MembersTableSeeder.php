<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Group;
use App\Http\Models\User;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //获取第一个组
        $group=Group::first();
        //获取所有用户id
        $users=User::all()->pluck('id')->toArray();

        $group->users()->sync($users,false);
    }
}
