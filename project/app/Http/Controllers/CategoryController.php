<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
		return view('category.index', [
			'categoryList' => $this->getCategory()
		]);
	}

	public function show(int $id) {
		return view('category.show', [
			'id' => $id,
			'newsList' => $this->getNews()
		]);
	}
}