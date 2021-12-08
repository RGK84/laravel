<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getCategory());
    }

        public function getCategory(): array
	{
		$faker = Factory::create('ru_RU');

		$data = [];
		for($i = 0; $i < 5; $i++) {
			$data[] = [
				'title' => $faker->safeColorName(),
                'description' => $faker->realText(60),
                'updated_at' => now(),
				'created_at' => now()
			];
		}

		return $data;
	}
    
}
