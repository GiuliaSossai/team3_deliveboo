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
                'name' => 'Flora Alpina',
                'slug' => Str::slug('Flora Alpina'),
                'p_iva' => $faker->vat,
                'email' => $faker->unique()->safeEmail,
                'address' => 'Via del Lucumone 5, 06129 Perugia',
                'phone' => $faker->phoneNumber,
                'delivery_price' => 3,
                'delivery_time' => 20,
                'order_min' => 5,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'parrots'),
                'photo_bg' => $faker->imageUrl(800, 200, 'animals', true, 'bears')     
            ],
            [
                'name' => 'Il capriccio di Ciccio',
                'slug' => Str::slug('Il capriccio di Ciccio'),
                'p_iva' => $faker->vat,
                'email' => $faker->unique()->safeEmail,
                'address' => 'Strada del gioco 5, 06129 Perugia',
                'phone' => $faker->phoneNumber,
                'delivery_price' => 2,
                'delivery_time' => 30,
                'order_min' => 6,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'parrots'),
                'photo_bg' => $faker->imageUrl(800, 200, 'animals', true, 'bears')     
            ],
            [
                'name' => 'Kebab da Ciro',
                'slug' => Str::slug('Kebab da Ciro'),
                'p_iva' => $faker->vat,
                'email' => $faker->unique()->safeEmail,
                'address' => 'Via Enrico Caruso 7, 06132 Perugia',
                'phone' => $faker->phoneNumber,
                'delivery_price' => 1,
                'delivery_time' => 40,
                'order_min' => 0,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'parrots'),
                'photo_bg' => $faker->imageUrl(800, 200, 'animals', true, 'bears')     
            ],
            [
                'name' => 'Samurai Sushi',
                'slug' => Str::slug('Samurai Sushi'),
                'p_iva' => $faker->vat,
                'email' => $faker->unique()->safeEmail,
                'address' => 'Strada San Simone del Carmine 13, 06126 Perugia',
                'phone' => $faker->phoneNumber,
                'delivery_price' => 4,
                'delivery_time' => 20,
                'order_min' => 10,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'parrots'),
                'photo_bg' => $faker->imageUrl(800, 200, 'animals', true, 'bears')     
            ],
            [
                'name' => 'Los Pollos Hermanos',
                'slug' => Str::slug('Los Pollos Hermanos'),
                'p_iva' => $faker->vat,
                'email' => $faker->unique()->safeEmail,
                'address' => 'Via Tommaso Tittoni 1, 06131 Perugia',
                'phone' => $faker->phoneNumber,
                'delivery_price' => 2,
                'delivery_time' => 30,
                'order_min' => 5,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'parrots'),
                'photo_bg' => $faker->imageUrl(800, 200, 'animals', true, 'bears')     
            ],
            [
                'name' => 'La bella bettola',
                'slug' => Str::slug('La bella bettola'),
                'p_iva' => $faker->vat,
                'email' => $faker->unique()->safeEmail,
                'address' => 'Via delle Valli 4, 06125 Perugia',
                'phone' => $faker->phoneNumber,
                'delivery_price' => 2,
                'delivery_time' => 10,
                'order_min' => 7,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'parrots'),
                'photo_bg' => $faker->imageUrl(800, 200, 'animals', true, 'bears')     
            ],
            [
                'name' => 'Vin Santo',
                'slug' => Str::slug('Vin Santo'),
                'p_iva' => $faker->vat,
                'email' => $faker->unique()->safeEmail,
                'address' => 'Via dell\'acero 34, 06131 Perugia',
                'phone' => $faker->phoneNumber,
                'delivery_price' => 5,
                'delivery_time' => 30,
                'order_min' => 6,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'parrots'),
                'photo_bg' => $faker->imageUrl(800, 200, 'animals', true, 'bears')     
            ],
            [
                'name' => 'Dopolavoro Ferroviario',
                'slug' => Str::slug('Dopolavoro Ferroviario'),
                'p_iva' => $faker->vat,
                'email' => $faker->unique()->safeEmail,
                'address' => 'Via Quintino Sella 37, 06131 Perugia',
                'phone' => $faker->phoneNumber,
                'delivery_price' => 3,
                'delivery_time' => 20,
                'order_min' => 5,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'parrots'),
                'photo_bg' => $faker->imageUrl(800, 200, 'animals', true, 'bears')     
            ],
            [
                'name' => 'Bambù Pokè',
                'slug' => Str::slug('Bambù Pokè'),
                'p_iva' => $faker->vat,
                'email' => $faker->unique()->safeEmail,
                'address' => 'Corso Bersaglieri 20, 06130 Perugia',
                'phone' => $faker->phoneNumber,
                'delivery_price' => 7,
                'delivery_time' => 15,
                'order_min' => 10,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'parrots'),
                'photo_bg' => $faker->imageUrl(800, 200, 'animals', true, 'bears')     
            ],
            [
                'name' => 'Non è mica pizza e fichi',
                'slug' => Str::slug('Non è mica pizza e fichi'),
                'p_iva' => $faker->vat,
                'email' => $faker->unique()->safeEmail,
                'address' => 'Via dei narcisi 2, 06126 Perugia',
                'phone' => $faker->phoneNumber,
                'delivery_price' => 5,
                'delivery_time' => 20,
                'order_min' => 8,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'parrots'),
                'photo_bg' => $faker->imageUrl(800, 200, 'animals', true, 'bears')     
            ],
            [
                'name' => 'Le mille e una notte',
                'slug' => Str::slug('Le mille e una notte'),
                'p_iva' => $faker->vat,
                'email' => $faker->unique()->safeEmail,
                'address' => 'Via dei gladioli 3, 06126 Perugia',
                'phone' => $faker->phoneNumber,
                'delivery_price' => 7,
                'delivery_time' => 20,
                'order_min' => 7,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'parrots'),
                'photo_bg' => $faker->imageUrl(800, 200, 'animals', true, 'bears')     
            ],
            [
                'name' => 'Il pacchero',
                'slug' => Str::slug('Il pacchero'),
                'p_iva' => $faker->vat,
                'email' => $faker->unique()->safeEmail,
                'address' => 'Via Bruno Colli 19, 06127 Perugia',
                'phone' => $faker->phoneNumber,
                'delivery_price' => 8,
                'delivery_time' => 30,
                'order_min' => 7,
                'photo' => $faker->imageUrl(360, 360, 'animals', true, 'parrots'),
                'photo_bg' => $faker->imageUrl(800, 200, 'animals', true, 'bears')     
            ]

        ];

        // foreach($users as $key => $user){

        //     $new_restaurant = new Restaurant();
        //     $new_restaurant->user_id = $user['id'];
        //     $new_restaurant->name = $rests[$key]['name'];
        //     $new_restaurant->slug = $rests[$key]['slug'];
        //     $new_restaurant->p_iva = $rests[$key]['p_iva'];
        //     $new_restaurant->email = $rests[$key]['email'];
        //     $new_restaurant->address = $rests[$key]['address'];
        //     $new_restaurant->phone = $rests[$key]['phone'];
        //     $new_restaurant->delivery_price = $rests[$key]['delivery_price'];
        //     $new_restaurant->delivery_time = $rests[$key]['delivery_time'];
        //     $new_restaurant->order_min = $rests[$key]['order_min'];
        //     $new_restaurant->photo = $rests[$key]['photo'];
        //     $new_restaurant->photo_bg = $rests[$key]['photo_bg'];     
        //     $new_restaurant->save();

        // }

        foreach($rests as $rest){ 

            $new_restaurant = new Restaurant();
            $new_restaurant->user_id = User::inRandomOrder()->first()->id;

            $new_restaurant->name = $rest['name'];
            $new_restaurant->slug = $rest['slug'];
            $new_restaurant->p_iva = $rest['p_iva'];
            $new_restaurant->email = $rest['email'];
            $new_restaurant->address = $rest['address'];
            $new_restaurant->phone = $rest['phone'];
            $new_restaurant->delivery_price = $rest['delivery_price'];
            $new_restaurant->delivery_time = $rest['delivery_time'];
            $new_restaurant->order_min = $rest['order_min'];
            $new_restaurant->photo = $rest['photo'];
            $new_restaurant->photo_bg = $rest['photo_bg'];   

            $new_restaurant->save();
        }
    }
}
