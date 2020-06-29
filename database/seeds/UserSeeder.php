<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create(
            array(
                'name'=>'admin',
                'email'=>'admin@admin.com',
                'password' => bcrypt('admin'),
                'isAdmin'=>true,
            )
        );
        App\User::create(
            array(
                'name'=>'user1',
                'email'=>'user@user.com',
                'password' => bcrypt('user'),
                'isAdmin'=>false,
            )
        );
        App\User::create(
            array(
                'name'=>'user2',
                'email'=>'user2@user.com',
                'password' => bcrypt('user'),
                'isAdmin'=>false,
            )
        );
        App\User::create(
            array(
                'name'=>'user3',
                'email'=>'user3@user.com',
                'password' => bcrypt('user'),
                'isAdmin'=>false,
            )
        );
    }
}
