<?php

use App\Dish;
use App\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishesOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quantity = 2;

        for ($i=0; $i < 50; $i++) { 


            $order = Order::inRandomOrder()->first();
            $dish_id = Dish::inRandomOrder()->first()->id;

            $order->dishes()->attach($dish_id);

            
        }
    }
}
