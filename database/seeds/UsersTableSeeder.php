<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\User::create([
        //     'name' => Str::random(10),
        //     'username' => Str::random(10), 
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => bcrypt('secret'),
        // ]);
        factory(\App\User::class,1000)->create()->each(function($user){
            \App\RoleUser::create(['user_id'=> $user->id,'role_id'=>3]);
        });
    }
}
