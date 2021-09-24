<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class HomepageController extends Controller
{
    public function index() {
		return view('homepage', [
			'newsCount' => News::query()->count(),
            'categoryCount' => Category::query()->count(),
			'categoryList' => Category::all()
		]);
	}
}
