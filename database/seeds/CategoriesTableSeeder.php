<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Italiana',
                'image' => 'img/categories/italiana.png',
            ],
            [
                'name' => 'Cinese',
                'image' => 'img/categories/cinese.png',
            ],
            [
                'name' => 'Giapponese',
                'image' => 'img/categories/japanese.png',
            ],
            [
                'name' => 'Messicana',
                'image' => 'img/categories/mexican.png',
            ],
            [
                'name' => 'Sushi',
                'image' => 'img/categories/sushi.png',
            ],
            [
                'name' => 'Pizza',
                'image' => 'img/categories/pizza.png',
            ],
            [
                'name' => 'Kebap',
                'image' => 'img/categories/kebab.png',
            ],
            [
                'name' => 'Hamburger',
                'image' => 'img/categories/hamburger.png',
            ],
            [
                'name' => 'Vegan',
                'image' => 'img/categories/vegan.png',
            ],
            [
                'name' => 'Dolci',
                'image' => 'img/categories/dessert.png',
            ]
        ];

        foreach ($categories as $category) {

            $new_category = new Category();

            $new_category->name = $category['name'];
            $new_category->image = $category['image'];
            $new_category->slug = Str::slug($new_category->name);

            $new_category->save();
        }
    }
}
