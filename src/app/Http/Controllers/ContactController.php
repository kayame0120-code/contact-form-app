<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('contact.index', compact( 'categories'));
    }
    public function confirm(ContactRequest $request)
    {
        $tel = $request->tel1 . $request->tel2 . $request->tel3;
        $contact = $request->except(['tel1', 'tel2', 'tel3', '_token']);
        $contact['tel'] = $tel;
        $categories = Category::all();
        return view('contact.confirm', compact('contact', 'categories'));
    }
    public function store(Request $request)
    {   
        $contact = $request->except(['_token']);
        Contact::create($contact);
        return view('contact.thanks');
    }
}
