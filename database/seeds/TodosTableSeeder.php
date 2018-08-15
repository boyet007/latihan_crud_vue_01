<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Todo;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        Todo::truncate();

        foreach(range(1,30) as $i) {
            Todo::create([
                'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]);
        }
    }
}
