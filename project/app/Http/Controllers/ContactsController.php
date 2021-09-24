<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        return view('contacts', [
            'categoryList' => Category::all()
		]);
    }

    public function store(Request $request): RedirectResponse
    {
        $contact = Contact::create($request->only('name', 'email', 'text'));

        if( $contact ) {
            return redirect()
                ->route('contacts')
                ->with('success', 'Запрос успешно отправлен');
        }

        return back()
            ->with('error', 'Запрос не создан')
            ->withInput();
    }
}
