<?php

use App\Restaurant;
use App\User;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create("it_IT");

        for ($i=0; $i < 30; $i++) { 

            $new_restaurant = new Restaurant();

            $new_restaurant->user_id = User::inRandomOrder()->first()->id;
            $new_restaurant->name = $faker->company;
            $new_restaurant->slug = Str::slug($new_restaurant->name);
            $new_restaurant->p_iva = $faker->vat;
            $new_restaurant->email = $faker->unique()->safeEmail;
            $new_restaurant->address = $faker->streetAddress;
            $new_restaurant->phone = $faker->phoneNumber;
            $new_restaurant->delivery_price = $faker->numberBetween(0, 20);
            $new_restaurant->delivery_time = $faker->numberBetween(0, 120);
            $new_restaurant->order_min = $faker->numberBetween(0, 99);
            $new_restaurant->photo = $faker->imageUrl(360, 360, 'animals', true, 'parrots');      
            $new_restaurant->photo_bg = $faker->imageUrl(800, 200, 'animals', true, 'bears');      

            $new_restaurant->save();
        }
    }
}
