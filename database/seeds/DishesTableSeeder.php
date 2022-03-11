<?php

use App\Dish;
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
                'description' => 'mozzarella, pomodoro, basilico',
                'price' => 4.50,
                'photo' => 'img/img-seeder/dishes/margherita.jpg',
                'visible' => 1,
                'type_id' => 4,
                'restaurant_id' => 7
            ],
            [
                'name' => 'Marinara',
                'description' => 'pomodoro, aglio',
                'price' => 4.99,
                'photo' => 'img/img-seeder/dishes/marinara.jpeg',
                'visible' => 1,
                'type_id' => 4,
                'restaurant_id' => 1
            ],
            [
                'name' => 'Farinata',
                'description' => 'ceci, acqua, olio',
                'price' => 2.5,
                'photo' => 'img/img-seeder/dishes/farinata.jpg',
                'visible' => 1,
                'type_id' => 1,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Carbonara',
                'description' => 'pasta, uova, pecorino, guanciale',
                'price' => 8,
                'photo' => 'img/img-seeder/dishes/carbonara.jpg',
                'visible' => 1,
                'type_id' => 2,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Fiorentina',
                'description' => 'Chianina, aglio, rosmarino',
                'price' => 20,
                'photo' => 'img/img-seeder/dishes/fiorentina.png',
                'visible' => 1,
                'type_id' => 3,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Calzone',
                'description' => 'mozzarella, pomodoro, prosciutto',
                'price' => 6,
                'photo' => 'img/img-seeder/dishes/calzone.jpg',
                'visible' => 1,
                'type_id' => 4,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Diavola',
                'description' => 'mozzarella, pomodoro, salame piccante, provola affumicata',
                'price' => 7.99,
                'photo' => 'img/img-seeder/dishes/diavola.jpg',
                'visible' => 1,
                'type_id' => 4,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Ortolana',
                'description' => 'mozzarella, verdure grigliate',
                'price' => 5,
                'photo' => 'img/img-seeder/dishes/ortolana.jpg',
                'visible' => 1,
                'type_id' => 4,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Topolino',
                'description' => 'mozzarella, pomodoro, patatine, wurstel',
                'price' => 6,
                'photo' => 'img/img-seeder/dishes/topolino.jpg',
                'visible' => 1,
                'type_id' => 4,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Tortino di cuore caldo',
                'description' => 'cioccolato, panna',
                'price' => 5,
                'photo' => 'img/img-seeder/dishes/tortino.jpg',
                'visible' => 1,
                'type_id' => 6,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Coca-Cola',
                'description' => 'vetro 33cl',
                'price' => 2.5,
                'photo' => 'img/img-seeder/dishes/cocacola.png',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Fanta',
                'description' => 'lattina 33cl',
                'price' => 2.5,
                'photo' => 'img/img-seeder/dishes/fanta.jpg',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Sprite',
                'description' => 'lattina 33cl',
                'price' => 2.5,
                'photo' => 'img/img-seeder/dishes/sprite.jpg',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Nastro Azzurro',
                'description' => 'bottiglia 33cl',
                'price' => 3,
                'photo' => 'img/img-seeder/dishes/nastroazzurro.jpeg',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Udon alle verdure',
                'description' => 'carote, zucchine, funghi, germogli di soia',
                'price' => 6.50,
                'photo' => 'img/img-seeder/dishes/udon.jpg',
                'visible' => 1,
                'type_id' => 2,
                'restaurant_id' => 4
            ],
            [
                'name' => 'Tagliolini al tartufo',
                'description' => 'tartufo nero, aglio, burro, uova',
                'price' => 10.50,
                'photo' => 'img/img-seeder/dishes/tartufo.jpeg',
                'visible' => 1,
                'type_id' => 2,
                'restaurant_id' => 2
            ],
            [
                'name' => 'Lasagne della nonna',
                'description' => 'ragu, besciamella, pomodoro, prezzemolo',
                'price' => 8.50,
                'photo' => 'img/img-seeder/dishes/lasagne.jpg',
                'visible' => 1,
                'type_id' => 2,
                'restaurant_id' => 6
            ],
            [
                'name' => 'Arrotolato Kebab',
                'description' => 'carne, patatine, cipolla, insalata, pomodoro, salse',
                'price' => 5.50,
                'photo' => 'img/img-seeder/dishes/kebab.jpg',
                'visible' => 1,
                'type_id' => 5,
                'restaurant_id' => 3
            ],
            [
                'name' => 'Baklava',
                'description' => 'miele, noci, pistacchio',
                'price' => 3.50,
                'photo' => 'img/img-seeder/dishes/baklava.jpg',
                'visible' => 1,
                'type_id' => 6,
                'restaurant_id' => 3
            ],
            [
                'name' => 'Bowl Colorata',
                'description' => 'riso, mango, edamame, salmone affumicato, funghi, avocado',
                'price' => 9.50,
                'photo' => 'img/img-seeder/dishes/poke.jpg',
                'visible' => 1,
                'type_id' => 2,
                'restaurant_id' => 9
            ],
            [
                'name' => 'Toro Seduto',
                'description' => 'pane ciabatta, hamburger chianina, cheddar, pomodoro, cipolla caramellata, maionese al pepe',
                'price' => 8.50,
                'photo' => 'img/img-seeder/dishes/hamburger.jpg',
                'visible' => 1,
                'type_id' => 5,
                'restaurant_id' => 5
            ],
            [
                'name' => 'Fagioli Trinità',
                'description' => 'fagioli, cipolla, pomodoro, chilli, panna acida',
                'price' => 6.50,
                'photo' => 'img/img-seeder/dishes/fagioli.jpeg',
                'visible' => 1,
                'type_id' => 3,
                'restaurant_id' => 8
            ],
            [
                'name' => 'Tiramisù',
                'description' => 'savoiardi, mascarpone, cacao, caffè, uova',
                'price' => 5,
                'photo' => 'img/img-seeder/dishes/tiramisu.jpg',
                'visible' => 1,
                'type_id' => 6,
                'restaurant_id' => 1
            ],
            [
                'name' => 'Tisana del dolce dormire',
                'description' => 'melissa, valeriana, camomilla',
                'price' => 4,
                'photo' => 'img/img-seeder/dishes/tisana.jpg',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 11
            ],
            [
                'name' => 'Hummus',
                'description' => 'ceci, limone, tahina, prezzemolo, aglio',
                'price' => 5,
                'photo' => 'img/img-seeder/dishes/hummus.jpg',
                'visible' => 1,
                'type_id' => 1,
                'restaurant_id' => 11
            ],
            [
                'name' => 'Pacchero della casa',
                'description' => 'pomodorini gialli, scampi, pesce spada, prezzemolo',
                'price' => 9,
                'photo' => 'img/img-seeder/dishes/pacchero.jpeg',
                'visible' => 1,
                'type_id' => 2,
                'restaurant_id' => 12
            ],
            // Acqua per ogni ristorante (da sistemare)
            [
                'name' => 'Acqua naturale',
                'description' => 'Acqua San Benedetto naturale in vetro 1l',
                'price' => 1.50,
                'photo' => 'img/img-seeder/dishes/acqua-nat.png',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 2
            ],
            [
                'name' => 'Acqua naturale',
                'description' => 'Acqua San Benedetto naturale in vetro 1l',
                'price' => 1.50,
                'photo' => 'img/img-seeder/dishes/acqua-nat.png',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 3
            ],
            [
                'name' => 'Acqua naturale',
                'description' => 'Acqua San Benedetto naturale in vetro 1l',
                'price' => 1.50,
                'photo' => 'img/img-seeder/dishes/acqua-nat.png',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 4
            ],
            [
                'name' => 'Acqua naturale',
                'description' => 'Acqua San Benedetto naturale in vetro 1l',
                'price' => 1.50,
                'photo' => 'img/img-seeder/dishes/acqua-nat.png',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 5
            ],
            [
                'name' => 'Acqua naturale',
                'description' => 'Acqua San Benedetto naturale in vetro 1l',
                'price' => 1.50,
                'photo' => 'img/img-seeder/dishes/acqua-nat.png',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 6
            ],
            [
                'name' => 'Acqua naturale',
                'description' => 'Acqua San Benedetto naturale in vetro 1l',
                'price' => 1.50,
                'photo' => 'img/img-seeder/dishes/acqua-nat.png',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 1
            ],
            [
                'name' => 'Acqua naturale',
                'description' => 'Acqua San Benedetto naturale in vetro 1l',
                'price' => 1.50,
                'photo' => 'img/img-seeder/dishes/acqua-nat.png',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 7
            ],
            [
                'name' => 'Acqua naturale',
                'description' => 'Acqua San Benedetto naturale in vetro 1l',
                'price' => 1.50,
                'photo' => 'img/img-seeder/dishes/acqua-nat.png',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 8
            ],
            [
                'name' => 'Acqua naturale',
                'description' => 'Acqua San Benedetto naturale in vetro 1l',
                'price' => 1.50,
                'photo' => 'img/img-seeder/dishes/acqua-nat.png',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 9
            ],
            [
                'name' => 'Acqua naturale',
                'description' => 'Acqua San Benedetto naturale in vetro 1l',
                'price' => 1.50,
                'photo' => 'img/img-seeder/dishes/acqua-nat.png',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Acqua naturale',
                'description' => 'Acqua San Benedetto naturale in vetro 1l',
                'price' => 1.50,
                'photo' => 'img/img-seeder/dishes/acqua-nat.png',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 11
            ],
            [
                'name' => 'Acqua naturale',
                'description' => 'Acqua San Benedetto naturale in vetro 1l',
                'price' => 1.50,
                'photo' => 'img/img-seeder/dishes/acqua-nat.png',
                'visible' => 1,
                'type_id' => 7,
                'restaurant_id' => 12
            ],
        ];

        foreach ($plates as $plate) {

            $new_dish = new Dish();

            $new_dish->restaurant_id = $plate['restaurant_id'];
            $new_dish->type_id = $plate['type_id'];
            $new_dish->name = $plate['name'];
            $new_dish->slug = Dish::generateSlug($new_dish->name);
            $new_dish->description = $plate['description'];
            $new_dish->price = $plate['price'];
            $new_dish->photo = $plate['photo'];
            $new_dish->visible = $plate['visible'];

            $new_dish->save();
        }
    }
}
