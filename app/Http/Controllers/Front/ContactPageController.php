<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFrontContact;
use App\Mail\ContactMail;
use App\Mail\PasswordMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactPageController extends Controller
{
    public function index()
    {
        $page = Contact::find(1);
        return view('front.pages.contact', compact('page'));
    }

    public function message(StoreFrontContact $request)
    {
        Mail::to('kirillsvr@mail.ru')->send(new ContactMail($request->validated()));
        return response()->json('OK', 200);
    }
}
