<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order', [
            'categoryList' => Category::all()
		]);
    }

    public function store(Request $request): RedirectResponse
    {
        $order = Order::create($request->only('name', 'phone', 'email', 'text'));

        if( $order ) {
            return redirect()
                ->route('order')
                ->with('success', 'Запрос успешно отправлен');
        }

        return back()
            ->with('error', 'Запрос не создан')
            ->withInput();
    }
}
