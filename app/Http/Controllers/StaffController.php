<?php

namespace App\Http\Controllers;

use App\Notifications\NewStaffMember;
use App\Notifications\StaffMemberDestroy;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class StaffCOntroller
 * @package App\Http\Controllers
 */
class StaffController extends Controller
{
    // TODO: Add phpunit tests

    /**
     * StaffController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('lang');
    }

    /**
     * Get the staff members overview for this platform,
     *
     * @url    GET|HEAD: /staff
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // TODO: implment validation error.
        $data['logins'] = User::paginate(15);
        return view('staff.index', $data);
    }

    /**
     * [VIEW]: Update a staff member in the application.
     *
     * @url    GET|HEAD: /staff/edit/{id}
     * @param  int $id the IMA user in the database.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data['user'] = User::find($id);
        return view('staff.edit', $data);
    }

    /**
     * [METHOD]: Update a staff member in the system.
     *
     * @url    POST: /staff/edit/{id}
     * @param  int $id The IMA user in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        return redirect()->back();
    }

    /**
     * Search for a staff member.
     *
     * @url    POST: /staff/search
     * @param  Requests\StaffSearchValidator $input
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Requests\StaffSearchValidator $input)
    {
        $data['logins'] = User::Search($input->term)->paginate(15);
        return view('staff.index', $data);
    }

    /**
     * [VIEW]: Create the new staff memeber in the IMA system.
     *
     * @url    GET|HEAD: /staff/register
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view('staff.register');
    }

    /**
     * [METHOD]: Create the new staff member in the IMA system.
     *
     * @url    POST: /staff/register
     * @param  Requests\NewLoginValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\NewLoginValidator $input)
    {
        if (User::create($input->except('_token'))) {
            session()->flash('message', '');

            // Notification
            // Query: REF -> Silber\Bouncer #96
            $users = User::whereIs(['admin', 'manager'])->get();
            $user  = auth()->user();
            $user->notify($users, new NewStaffMember());
        }

        return redirect()->back();
    }

    public function show($id)
    {

    }

    /**
     * Destroy staff members in the IMA application.
     *
     * @url    GET|HEAD: /staff/destroy/{id}
     * @param  int $id the id off the login credentails.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if (User::destroy($id)) {
            session()->flash('message', 'Staff member has been deleted');

            $user  = auth()->user();
            $users = User::whereIs(['admin', 'manager'])->get();
            $user->notify($users, new StaffMemberDestroy());
        }

        return redirect()->back();
    }
}
