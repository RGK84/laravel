<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order', [
			'categoryList' => $this->getCategory()
		]);
    }

    public function store(Request $request)
    {
        $content = $request->all();
        return response($content)
            ->withHeaders([
                'Content-Type' => 'application/txt; charset=UTF-8',
                'Content-Disposition' => 'attachment; filename="order.txt"'
            ]);
    }
}
