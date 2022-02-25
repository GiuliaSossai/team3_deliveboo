<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $categories = [

            'Italiana',
            'Cinese',
            'Giapponese',
            'Messicana',
            'Sushi',
            'Pizza',
            'Kebap',
            'Hamburger',
            'Vegan',
            'Dolci'


        ];

        foreach ($categories as $category) { 

            $new_category = new Category();

            $new_category->name = $category;
            $new_category->image = $faker->imageUrl(360, 360, 'animals', true, 'cats');
            $new_category->slug = Str::slug($new_category->name);
            

            $new_category->save();
        }
    }
}
