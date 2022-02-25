<?php

use App\Order;
use App\Restaurant;
use Faker\Factory;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create("it_IT");

        for ($i=0; $i < 10; $i++) { 

            $new_order = new Order();

            $new_order->restaurant_id = Restaurant::inRandomOrder()->first()->id;
            $new_order->customer_name = $faker->firstName;
            $new_order->customer_surname = $faker->lastName;
            $new_order->customer_email = $faker->unique()->safeEmail;
            $new_order->customer_phone = $faker->phoneNumber;
            $new_order->delivery_address = $faker->streetAddress;
            $new_order->final_price = $faker->numberBetween(0, 500);


            $new_order->save();
        }
    }
}
