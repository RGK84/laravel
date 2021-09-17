<?php

namespace App\Http\Controllers;



use Illuminate\Http\RedirectResponse;

class ContactsController extends Controller
{
    public function index()
    {
        return view('contacts', [
			'categoryList' => $this->getCategory()
		]);
    }

    public function store(): RedirectResponse
    {
        return redirect()->route('home');
    }
}
