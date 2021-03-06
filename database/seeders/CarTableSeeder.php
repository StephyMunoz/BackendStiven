<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

     //   Car::truncate();

        $faker = \Faker\Factory::create();

        $users = User::all();

        foreach ($users as $user) {
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);


               $car = Car::create();

               $car->products()->saveMany(
                   $faker->randomElements(
                       array(
                           Product::find(1),
                           Product::find(2),
                           Product::find(3)

                       ),  $faker->numberBetween(1,3), false
                   )
               );

        }


    }
}
