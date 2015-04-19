<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class VehiclesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Vehicle::create([
				'make' => $faker->city,
				'model' => $faker->name,
				'year'  => $faker->year
			]);
		}
	}

}