<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactsCreateRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;

class ContactsController extends Controller
{
    public function index()
    {
        return view('contacts', [
            'categoryList' => Category::all()
		]);
    }

    public function store(ContactsCreateRequest $request): RedirectResponse
    {
        $contact = Contact::create($request->validated());

        if( $contact ) {
            return redirect()
                ->route('contacts')
                ->with('success', __('messages.contacts.create.success'));
        }

        return back()
            ->with('error', __('messages.contacts.create.fail'))
            ->withInput();
    }
}
