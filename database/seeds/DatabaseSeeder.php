<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Model::unguard();
        
        $this->call(UsersTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(MembersTableSeeder::class);

        Model::reguard();
    }
}
