<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getNews());
    }

    public function getNews(): array
	{
		$faker = Factory::create('ru_RU');

		$data = [];
		$countNumber = mt_rand(10, 15);

		for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < $countNumber; $j++) {
                $data[] = [
                    'category_id' => ($i + 1),
                    'title' => "Новость № ". ($i * $countNumber + $j + 1) . " " . $faker->bank(),
					'description' => $faker->realText(1000),
                    'author' => $faker->name(),
                    'source_id' => mt_rand(1, 10),
                    'updated_at' => now(),
				    'created_at' => now()
                ];
            }
		}

		return $data;
    }
}
