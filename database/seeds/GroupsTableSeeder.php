<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create(['name' => 'General', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        Group::create(['name' => 'Admin', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()]);
    }
}
