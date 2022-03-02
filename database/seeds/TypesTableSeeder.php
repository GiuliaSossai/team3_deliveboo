<?php

use App\Type;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $types = [
            'Antipasti',
            'Primi',
            'Secondi',
            'Dessert',
            'Bevande'
        ];

        foreach ($types as $type) {

            $new_type = new Type();

            $new_type->name = $type;
            $new_type->image = $faker->imageUrl(360, 360, 'animals', true, 'dogs');

            $new_type->save();
        }
    }
}
