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

        for ($i=0; $i < 50; $i++) { 


            $order = Order::inRandomOrder()->first();
            $dish_id = Dish::inRandomOrder()->first()->id;

            $order->dishes()->attach($dish_id);

            //Codice utilizzato per inserire la quantità
            $orders = Order::all();
            Dish::all()->each(function ($dish) use ($orders) {
                $orderIds = $orders->random(3)->pluck('id')->toArray();
                foreach ($orderIds as $orderId) {
                    $dish->orders()->attach($orderId, ['quantity' => rand(1, 3)]);
                }
            });

            
        }
    }
}
