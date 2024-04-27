<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Auth;

class ProfileAdminController extends Controller
{

    public function showProfile()
    {
        $generalSettings = GeneralSetting::first();
        return view('Back_End.pages.profile.index', compact('generalSettings'));
    }


}