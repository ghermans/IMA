<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('lang');
    }

    /**
     * Get the update view for the profile settings.
     *
     * @url   GET|HEAD: /profile/settings
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function AccountInformation()
    {
        return view('auth.profile');
    }
}
