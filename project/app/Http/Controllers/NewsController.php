<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index() {
		return view('news.index', [
			'newsList' => News::with('category')->get(),
			'categoryList' => Category::all()
		]);
	}

	public function show($id)
	{
		return view('news.show', [
			'news' => News::with('category')->find($id),
			'categoryList' => Category::all()
		]);
	}
}
