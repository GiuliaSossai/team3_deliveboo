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

        $plates = [
            [
                'name' => 'Margherita',
                'description' => 'mozzarella | pomodoro | basilico',
                'price' => 4.50,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'fish'),
                'visible' => 1,
                'type_id' => 2,
                'restaurant_id' => 7
            ],
            [
                'name' => 'Marinara',
                'description' => 'pomodoro | aglio',
                'price' => 4,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'fish'),
                'visible' => 1,
                'type_id' => 2,
                'restaurant_id' => 1
            ],
            [
                'name' => 'Calzone',
                'description' => 'mozzarella | pomodoro | prosciutto',
                'price' => 6,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'fish'),
                'visible' => 1,
                'type_id' => 2,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Udon alle verdure',
                'description' => 'carote | zucchine | funghi | germogli di soia',
                'price' => 6.50,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'fish'),
                'visible' => 1,
                'type_id' => 2,
                'restaurant_id' => 4
            ],
            [
                'name' => 'Tagliolini al tartufo',
                'description' => 'tartufo nero | aglio | burro | uova',
                'price' => 10.50,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'fish'),
                'visible' => 1,
                'type_id' => 2,
                'restaurant_id' => 2
            ],
            [
                'name' => 'Lasagne ai frutti di mare',
                'description' => 'cozze | vongole | gamberoni | pomodoro | prezzemolo',
                'price' => 8.50,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'fish'),
                'visible' => 1,
                'type_id' => 2,
                'restaurant_id' => 6
            ],
            [
                'name' => 'Arrotolato Kebab',
                'description' => 'carne | patatine | cipolla | insalata | pomodoro | salse',
                'price' => 5.50,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'fish'),
                'visible' => 1,
                'type_id' => 3,
                'restaurant_id' => 3
            ],
            [
                'name' => 'Baklava',
                'description' => 'miele | noci | pistacchio',
                'price' => 3.50,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'fish'),
                'visible' => 1,
                'type_id' => 4,
                'restaurant_id' => 3
            ],
            [
                'name' => 'Bowl Colorata',
                'description' => 'riso | mango | edamame | salmone affumicato | funghi | avocado',
                'price' => 9.50,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'fish'),
                'visible' => 1,
                'type_id' => 2,
                'restaurant_id' => 9
            ],
            [
                'name' => 'Toro Seduto',
                'description' => 'pane ciabatta | hamburger chianina | cheddar | pomodoro | cipolla caramellata | maionese al pepe',
                'price' => 8.50,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'fish'),
                'visible' => 1,
                'type_id' => 3,
                'restaurant_id' => 5
            ],
            [
                'name' => 'Fagioli Trinità',
                'description' => 'fagioli | cipolla | pomodoro | chilli | panna acida',
                'price' => 6.50,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'fish'),
                'visible' => 1,
                'type_id' => 3,
                'restaurant_id' => 8
            ],
            [
                'name' => 'Tiramisù',
                'description' => 'savoiardi | mascarpone | cacao | caffè | uova',
                'price' => 5,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'fish'),
                'visible' => 1,
                'type_id' => 4,
                'restaurant_id' => 1
            ],
            [
                'name' => 'Tisana del dolce dormire',
                'description' => 'melissa | valeriana | camomilla',
                'price' => 4,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'fish'),
                'visible' => 1,
                'type_id' => 5,
                'restaurant_id' => 11
            ],
            [
                'name' => 'Hummus',
                'description' => 'ceci | limone | tahina | prezzemolo | aglio',
                'price' => 5,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'fish'),
                'visible' => 1,
                'type_id' => 1,
                'restaurant_id' => 11
            ],
            [
                'name' => 'Pacchero della casa',
                'description' => 'pomodorini gialli | scampi | pesce spada | prezzemolo',
                'price' => 9,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'fish'),
                'visible' => 1,
                'type_id' => 2,
                'restaurant_id' => 12
            ]
        ];

        foreach($plates as $plate) { 

            $new_dish = new Dish();
            // $new_dish->restaurant_id = Restaurant::inRandomOrder()->first()->id;
            // $new_dish->type_id = Type::inRandomOrder()->first()->id;

            $new_dish->restaurant_id = $plate['restaurant_id'];
            $new_dish->type_id = $plate['type_id'];
            $new_dish->name = $plate['name'];
            $new_dish->description = $plate['description'];
            $new_dish->price = $plate['price'];
            $new_dish->photo = $plate['photo'];
            $new_dish->visible = $plate['visible'];

            //$new_dish->visible = $faker->numberBetween(0, 1);

            $new_dish->save();
        }

    }
}
