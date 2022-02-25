<?php

use App\Category;
use App\Restaurant;
use Illuminate\Database\Seeder;

class CategoriesRestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 50; $i++) { 
            $resturant = Restaurant::inRandomOrder()->first();
            $category_id = Category::inRandomOrder()->first()->id;

            $resturant->categories()->attach($category_id);
        }
    }
}
