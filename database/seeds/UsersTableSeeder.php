<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(['name' => 'root', 'email' => 'root@gmail.com', 'password' => bcrypt('P@ssw0rd')]);
        
        $user->groups()->sync([2]);
    }
}
