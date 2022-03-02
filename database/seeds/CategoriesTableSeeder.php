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
                'image' => 'img/img-seeder/categories/italiana.png',
            ],
            [
                'name' => 'Cinese',
                'image' => 'img/img-seeder/categories/cinese.png',
            ],
            [
                'name' => 'Giapponese',
                'image' => 'img/img-seeder/categories/japanese.png',
            ],
            [
                'name' => 'Messicana',
                'image' => 'img/img-seeder/categories/mexican.png',
            ],
            [
                'name' => 'Sushi',
                'image' => 'img/img-seeder/categories/sushi.png',
            ],
            [
                'name' => 'Pizza',
                'image' => 'img/img-seeder/categories/pizza.png',
            ],
            [
                'name' => 'Kebap',
                'image' => 'img/img-seeder/categories/kebab.png',
            ],
            [
                'name' => 'Hamburger',
                'image' => 'img/img-seeder/categories/hamburger.png',
            ],
            [
                'name' => 'Vegan',
                'image' => 'img/img-seeder/categories/vegan.png',
            ],
            [
                'name' => 'Dolci',
                'image' => 'img/img-seeder/categories/dessert.png',
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
