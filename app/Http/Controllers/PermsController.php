<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class PermsController
 * @package App\Http\Controllers
 */
class PermsController extends Controller
{
    /**
     * PermsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('lang');
    }

    /**
     * Permissions overview.
     *
     * @url    GET|HEAD: Permissions
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('permissions.index');
    }

    /**
     * Insert a new permission(s).
     *
     * @url    POST: /permissions/insert
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insertPermission()
    {
        return redirect()->back();
    }

    /**
     * Insert a new application name.
     *
     * @url    POST: /permissions/insert/application.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insertApplication()
    {
        return redirect()->back();
    }
}
