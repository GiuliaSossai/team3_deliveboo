<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(RestaurantsTableSeeder::class);
        $this->call(CategoriesRestaurantsTableSeeder::class);
        $this->call(DishesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(DishesOrdersTableSeeder::class);
    }
}
