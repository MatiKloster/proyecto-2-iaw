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
                'api_token'=>hash('sha256', 's3cr3tf0r4p1.Admin.EstaVezSeran3Estrellas?'),
            )
            );
    }
}
