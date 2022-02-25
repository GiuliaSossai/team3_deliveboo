<?php

use App\Dish;
use App\Restaurant;
use App\Type;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create("it_IT");

        for ($i=0; $i < 100; $i++) { 

            $new_dish = new Dish();
            $new_dish->restaurant_id = Restaurant::inRandomOrder()->first()->id;
            $new_dish->type_id = Type::inRandomOrder()->first()->id;
            $new_dish->name = $faker->words(1, true);
            $new_dish->description = $faker->words(5, true);
            $new_dish->price = $faker->numberBetween(0, 100);
            $new_dish->photo = $faker->imageUrl(360, 360, 'animals', true, 'fish');  
            $new_dish->visible = $faker->numberBetween(0, 1);

            $new_dish->save();
        }

    }
}
