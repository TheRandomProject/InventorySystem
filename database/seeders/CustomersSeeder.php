<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 1; $i <= 100; $i++) {
            \App\Models\Customers::create([
                'name' => $faker->name,
                'address' => $faker->address,
                'contact' => $faker->phoneNumber,
            ]);
        }
    }
}
