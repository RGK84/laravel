<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(Request $request)
    {
        return view('contacts', [
			'categoryList' => $this->getCategory()
		]);
    }

    public function store()
    {
        return redirect()->route('home');
    }
}
