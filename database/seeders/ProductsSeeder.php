<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
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
            \App\Models\Products::create([
                'description' => $faker->company,
                'ref' => $faker->numberBetween(100, 1000),
                'lot' => $faker->numberBetween(100, 1000),
                'expiry' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+30 years'),
                'quantity' => $faker->numberBetween(100, 1000),
                'incomingdate' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+30 years'),
                'asof' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+30 years'),
                'ageing' => $faker->numberBetween(100, 1000),
            ]);
        }
    }
}
