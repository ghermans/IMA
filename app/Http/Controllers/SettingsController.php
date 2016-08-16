<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class SettingsController
 * @package App\Http\Controllers
 */
class SettingsController extends Controller
{
    /**
     * SettingsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('lang');
    }

    /**
     * Settings view.
     *
     * @url    GET|HEAD: /settings
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function View()
    {
        // Backup settings

        // Application settings

        return view('settings.index', $data);
    }

    public function BackUpSettingsStore()
    {
        session()->flash('message', 'Backup settings has been saved.');
        return redirect()->back();
    }

    public function ApplicationSettingsStore()
    {
        session()->flash('message', 'Application settings has been saved.');
        return redirect()->back();
    }
}
