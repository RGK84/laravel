<?php

namespace App\Http\Controllers;

class NewsController extends Controller
{
    public function index() {
		return view('news.index', [
			'newsList' => $this->getNews(),
			'categoryList' => $this->getCategory()
		]);
	}

	public function show(int $id)
	{
		return view('news.show', [
			'news' => $this->getOneNews($id),
			'categoryList' => $this->getCategory()
		]);
	}
}
