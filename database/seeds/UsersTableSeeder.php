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
        User::create(array('name'=>'Emmah Esla',
            'email' => 'eslaemmah@gmail.com',
            'role'=>'Admin',
            'password'=>  bcrypt('demo'),
            'remember_token' =>  Str::random(10),
            ));
    }
}
 
       