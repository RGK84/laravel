<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class CategoryController extends Controller
{
    public function index() {
		return view('category.index', [
			'categoryList' => Category::all()
		]);
	}

	public function show(int $category_id) {
		return view('category.show', [
			'newsList' => News::with('category')->where('category_id', $category_id)->get(),
			'categoryList' => Category::all()
		]);
	}
}
