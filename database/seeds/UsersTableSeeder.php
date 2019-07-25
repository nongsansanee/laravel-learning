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
        
        factory(\App\User::class,10)->create()->each(function($user){
            // \App\RoleUser::create(['user_id'=> $user->id,'role_id'=>3]); 
         
            // $user->roleUsers()->save(factory(App\RoleUser::class)->make());
            $user->roleUsers()->saveMany(factory(App\RoleUser::class,2)->make());
            // $user->tasks()->save(factory(App\Task::class)->make());
            $user->tasks()->saveMany(factory(App\Task::class,10)->make());
        });
    }
}
