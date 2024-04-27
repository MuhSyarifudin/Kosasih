<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $generalSettings = GeneralSetting::first();
        $contacts = Contact::latest()->paginate(10);
        return view('Back_End.pages.message.index', compact('contacts', 'generalSettings'));
    }
}
