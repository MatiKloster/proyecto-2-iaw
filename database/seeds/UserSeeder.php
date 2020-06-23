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
                'email'=>'matikloster2@gmail.com',
                'password' => bcrypt('admin'),
                'isAdmin'=>true,
            )
            );
    }
}
