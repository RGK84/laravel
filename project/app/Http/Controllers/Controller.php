<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Collection;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	protected function getNews(): Collection
	{
        $model = new News();
        return $model->getNews();
	}

	protected function getOneNews($id)
	{
		$newsList = $this->getNews();
		return $newsList[$id-1];
	}

	protected function getNewsByCategory($category_id): Collection
	{
		$model = new News();
        return $model->getNewsByCategory($category_id);
//        $newsList = $this->getNewsByCategoryId($category_id);
//         = $newsList->intersect(News::whereIn('$category_id', $category_id)->get());
//        $model = new Category;
//        $category = $model->getCategoryById($category_id);
//		$data = [];
//		for ($i = 0; $i < count($newsList); $i++) {
//            if ($newsList[$i]['category_id'] == $category_id) {
//                $data[] = $newsList[$i];
//            }
//		}
//
//		return $data;
	}

    protected function getCategory(): Collection
	{
        $model = new Category();
        return $model->getCategory();
	}
}
