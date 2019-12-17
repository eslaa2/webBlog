<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('going to seed users table....');
         $this->call(UsersTableSeeder::class);
       // $this->call(PostTableSeeder::class);
          // $this->call(CommentTableSeeder::class);
	$this->command->info('users table seeded.');
        $this->command->info('password is demo...');
        
    }
}
