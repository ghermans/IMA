<?php

namespace App\Http\Controllers;

use App\Notifications\InsertPermission;
use App\Permissions;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Silber\Bouncer\Bouncer;
use Silber\Bouncer\Database\Role;

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
     * @param  Requests\PermissionValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insertPermission(Requests\PermissionValidator $input)
    {
        if (Permissions::create($input->except('_token'))) {
            $roles = User::whereIs('admin')->get();

            $user  = auth()->user();
        }

        session()->flash('Message', 'Permission has been added');
        return redirect()->back();
    }

    /**
     * Insert a new application name.
     *
     * @url    POST: /permissions/insert/application.
     * @param  Requests\PermissionValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insertApplication(Requests\PermissionValidator $input)
    {
        return redirect()->back();
    }
}
