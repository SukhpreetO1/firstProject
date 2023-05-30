<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $gender = $faker->randomElement(['male', 'female']);
        foreach (range(1, 50) as $index) {
            DB::table('students')->insert([
                'first_name' => $faker,
                'last_name' => $faker->name($gender),
                'email' => $faker->email,
                'userName' => $faker->username,
                'phone_number' => $faker->phoneNumber,
                'dob' => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }
    }
}
