<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request): RedirectResponse
    {
        if ($request->filled('website')) {
            return redirect('/#contact')->with('success', 'Thank you. Your message has been sent.');
        }

        Contact::create($request->validated());

        return redirect('/#contact')->with('success', 'Thank you. Your message has been sent. We will reply soon.');

    }
}
