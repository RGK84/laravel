<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	protected function getNews(): array
	{
		$faker = Factory::create('ru_RU');
		$data = [];
		$countNumber = mt_rand(5, 15);
        $category = $this->getCategory();
		for ($i = 0; $i < count($category); $i++) {
            for ($j = 0; $j < $countNumber; $j++) {
                $randCategory = $category[$i];
                $data[] = [
                    'id' => $i * $countNumber + $j + 1,
                    'category_id' => $randCategory['id'],
                    'category' => $randCategory['title'],
                    'title' => $faker->jobTitle(),
                    'description' => "<strong>" . $faker->sentence(5) . "</strong>",
                    'author' => $faker->name(),
                    'created_at' => now()
                ];
            }
		}

		return $data;
	}

    protected function getCategory(): array
	{
		$faker = Factory::create('ru_RU');
		$data = [];
		$countNumber = mt_rand(5, 7);
		for($i=0; $i<$countNumber; $i++) {
			$data[] = [
				'id' => $i+1,
				'title' => $faker->word(),
			];
		}

		return $data;
	}
}