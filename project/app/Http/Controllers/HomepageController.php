<?php

namespace App\Http\Controllers;

class HomepageController extends Controller
{
    public function index() {
		return view('homepage', [
			'newsCount' => count($this->getNews()),
            'categoryCount' => count($this->getCategory()),
			'categoryList' => $this->getCategory()
		]);
	}
}
