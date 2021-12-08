<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function index()
    {
        return view('order', [
            'categoryList' => Category::all()
		]);
    }

    public function store(OrderCreateRequest $request): RedirectResponse
    {
        $order = Order::create($request->validated());

        if( $order ) {
            return redirect()
                ->route('order')
                ->with('success', __('messages.order.create.success'));
        }

        return back()
            ->with('error', __('messages.order.create.fail'))
            ->withInput();
    }
}
