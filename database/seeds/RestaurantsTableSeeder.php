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

        $users = User::all();
        $rests = [
            [
                'user_id' => 2,
                'name' => 'Flora Alpina',
                'address' => 'Via del Lucumone 5, 06129 Perugia',
                'delivery_price' => 3.99,
                'delivery_time' => 20,
                'order_min' => 5,
                'photo' => 'img/img-seeder/restaurants/lasagna-rest.jpg',
                'photo_bg' => 'img/img-seeder/restaurants/lasagna-rest-bg.jpg',
            ],
            [
                'user_id' => 3,
                'name' => 'Il capriccio di Ciccio',
                'address' => 'Strada del gioco 5, 06129 Perugia',
                'delivery_price' => 1.99,
                'delivery_time' => 30,
                'order_min' => 6,
                'photo' =>  'img/img-seeder/restaurants/ciccio-rest.jpg',
                'photo_bg' => 'img/img-seeder/restaurants/ciccio-rest-bg.jpg',
            ],
            [
                'user_id' => 4,
                'name' => 'Kebab da Ciro',
                'address' => 'Via Enrico Caruso 7, 06132 Perugia',
                'delivery_price' => 1.50,
                'delivery_time' => 40,
                'order_min' => 0,
                'photo' => 'img/img-seeder/restaurants/kebab-rest.jpg',
                'photo_bg' => 'img/img-seeder/restaurants/kebab-rest-bg.jpg',
            ],
            [
                'user_id' => 3,
                'name' => 'Samurai Sushi',
                'address' => 'Strada San Simone del Carmine 13, 06126 Perugia',
                'delivery_price' => 2.50,
                'delivery_time' => 20,
                'order_min' => 10,
                'photo' => 'img/img-seeder/restaurants/sushi-rest.jpg',
                'photo_bg' => 'img/img-seeder/restaurants/sushi-rest-bg.jpg',
            ],
            [
                'user_id' => 1,
                'name' => 'Los Pollos Hermanos',
                'address' => 'Via Tommaso Tittoni 1, 06131 Perugia',
                'delivery_price' => 5,
                'delivery_time' => 30,
                'order_min' => 5,
                'photo' =>  'img/img-seeder/restaurants/pollos-rest.jpg',
                'photo_bg' => 'img/img-seeder/restaurants/pollos-rest-bg.jpg',
            ],
            [
                'user_id' => 2,
                'name' => 'La bella bettola',
                'address' => 'Via delle Valli 4, 06125 Perugia',
                'delivery_price' => 0,
                'delivery_time' => 10,
                'order_min' => 7,
                'photo' =>  'img/img-seeder/restaurants/trattoria1.jpg',
                'photo_bg' => 'img/img-seeder/restaurants/trattoria1-bg.jpg',
            ],
            [
                'user_id' => 4,
                'name' => 'Vin Santo',
                'address' => 'Via dell\'acero 34, 06131 Perugia',
                'delivery_price' => 5,
                'delivery_time' => 30,
                'order_min' => 6,
                'photo' =>  'img/img-seeder/restaurants/risto1.jpg',
                'photo_bg' => 'img/img-seeder/restaurants/risto1-bg.jpg',
            ],
            [
                'user_id' => 1,
                'name' => 'Dopolavoro Ferroviario',
                'address' => 'Via Quintino Sella 37, 06131 Perugia',
                'delivery_price' => 0,
                'delivery_time' => 20,
                'order_min' => 5,
                'photo' =>  'img/img-seeder/restaurants/dopo-rest.jpg',
                'photo_bg' => 'img/img-seeder/restaurants/dopo-rest-bg.jpg',
            ],
            [
                'user_id' => 3,
                'name' => 'Bambù Pokè',
                'address' => 'Corso Bersaglieri 20, 06130 Perugia',
                'delivery_price' => 0.99,
                'delivery_time' => 15,
                'order_min' => 10,
                'photo' => 'img/img-seeder/restaurants/poke-rest.jpg',
                'photo_bg' => 'img/img-seeder/restaurants/poke-rest-bg.jpg',
            ],
            [
                'user_id' => 1,
                'name' => 'Non è mica pizza e fichi',
                'address' => 'Via dei narcisi 2, 06126 Perugia',
                'delivery_price' => 2.50,
                'delivery_time' => 20,
                'order_min' => 8,
                'photo' => 'img/img-seeder/restaurants/pizza-fichi-rest.jpg',
                'photo_bg' => 'img/img-seeder/restaurants/pizza-fichi-rest-bg.jpg',
            ],
            [
                'user_id' => 4,
                'name' => 'Le mille e una notte',
                'address' => 'Via dei gladioli 3, 06126 Perugia',
                'delivery_price' => 3.99,
                'delivery_time' => 20,
                'order_min' => 7,
                'photo' => 'img/img-seeder/restaurants/chinese.jpg',
                'photo_bg' => 'img/img-seeder/restaurants/chinese-bg.jpg',
            ],
            [
                'user_id' => 2,
                'name' => 'Il pacchero',
                'address' => 'Via Bruno Colli 19, 06127 Perugia',
                'delivery_price' => 0,
                'delivery_time' => 30,
                'order_min' => 7,
                'photo' =>  'img/img-seeder/restaurants/trattoria.jpg',
                'photo_bg' => 'img/img-seeder/restaurants/trattoria-bg.jpg',
            ]

        ];

        foreach ($rests as $rest) {

            $new_restaurant = new Restaurant();
            $new_restaurant->user_id = $rest['user_id'];

            $new_restaurant->name = $rest['name'];
            $new_restaurant->slug = Str::slug($new_restaurant->name);
            $new_restaurant->p_iva = $faker->vat;
            $new_restaurant->email = $faker->unique()->safeEmail;
            $new_restaurant->address = $rest['address'];
            $new_restaurant->phone = $faker->phoneNumber;
            $new_restaurant->delivery_price = $rest['delivery_price'];
            $new_restaurant->delivery_time = $rest['delivery_time'];
            $new_restaurant->order_min = $rest['order_min'];
            $new_restaurant->photo = $rest['photo'];
            $new_restaurant->photo_bg = $rest['photo_bg'];

            $new_restaurant->save();
        }
    }
}
