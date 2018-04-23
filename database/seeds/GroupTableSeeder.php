<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Group;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = factory(Group::class)->times(50)->make();
        Group::insert($group->toArray());
    }
}
