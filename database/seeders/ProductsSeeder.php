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
                'name' => $faker->name,
                'price' => $faker->numberBetween(100, 1000),
                'brand' => $faker->company,
                'stock' => $faker->numberBetween(100, 1000),
            ]);
        }
    }
}
