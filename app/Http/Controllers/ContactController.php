<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class ContactController extends Controller
{
    public function index()
    {
        $generalSettings = GeneralSetting::first();
        $contacts = Contact::latest()->get();
        return view('Back_End.pages.contact.index', compact('contacts', 'generalSettings'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully');
    }
}