<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContact;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function edit()
    {
        $contact = Contact::find(1);
        return view('admin.pages.contact', compact('contact'));
    }

    public function update(StoreContact $request)
    {
        $contact = Contact::find(1);
        $contact->update($request->validated());
        $request->session()->flash('success', 'Страница "Контакты" обновлена');
        return redirect()->home();
    }
}
