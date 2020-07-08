<?php

use Illuminate\Database\Seeder;
use App\User;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstUser = User::find('2'); 
        $firstUser->movies()->sync([1,2,3,4,5]);
        $firstUser->albums()->sync([1,2,3,4,5]);

        $secondUser = User::find('3'); 
        $secondUser->movies()->sync([20,19,18,17,16,15,14]);
        $secondUser->albums()->sync([23,22,21,20,19,18,17]);

        $thirdUser = User::find('4'); 
        $thirdUser->movies()->sync([5,4,18,17,20,8,9]);
        $thirdUser->albums()->sync([1,2,3,20,19,8,9]);
    }
}
