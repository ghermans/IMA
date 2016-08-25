<?php

namespace App\Http\Controllers;

use App\Notifications\InsertPermission;
use App\Notifications\newApplication;
use App\Permissions;
use App\PermsApplication;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Notification;
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
        $this->middleware('lang');
    }

    /**
     * Permissions overview.
     *
     * @url    GET|HEAD: Permissions
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['applications'] = PermsApplication::all();
        $data['permissions']  = Permissions::with('application')->paginate(15);

        return view('permissions.index', $data);
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
            $users = User::whereIs('Administrator')->get();
            Notification::send($users, new InsertPermission());
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
        if (PermsApplication::create($input->except('_token'))) {
            $users = User::whereIs('Administrator')->get();
            Notification::send($users, new newApplication());
        }

        session()->flash('message', 'Application has been added');
        return redirect()->back();
    }

    /**
     * IMA Permissions - Delete a permission out off the database.
     *
     * @url    GET|HEAD
     * @param  int $pid The permission id.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($pid)
    {
        // TODO: Also need to delete the open requests for the permission.

       return redirect()->back();
    }
}
