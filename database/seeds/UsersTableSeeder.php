<?php

use App\User;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $faker = Factory::create("it_IT");

        for ($i=0; $i < 10; $i++) { 

            $new_user = new User();

            $new_user->name = $faker->firstName;
            $new_user->surname = $faker->lastName;
            $new_user->email = $faker->unique()->safeEmail;
            $new_user->email_verified_at = now();
            $new_user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
            $new_user->remember_token = Str::random(10);

            $new_user->save();
        }
    }
}
