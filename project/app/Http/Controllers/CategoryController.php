<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function index() {
		return view('category.index', [
			'categoryList' => $this->getCategory()
		]);
	}

	public function show(int $category_id) {
		return view('category.show', [
			'newsList' => $this->getNewsByCategory($category_id),
			'categoryList' => $this->getCategory()
		]);
	}
}
