<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class StaffCOntroller
 * @package App\Http\Controllers
 */
class StaffController extends Controller
{
    /**
     * StaffCOntroller constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('lang');
    }

    /**
     * Get the staff members overview for this platform,
     *
     * @url    GET|HEAD: /staff
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['logins'] = User::paginate(15);
        return view('staff.index', $data);
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view();
    }

    /**
     * @param  Requests\NewLoginValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(?Requests\NewLoginValidator $input)
    {
        return redirect()->back();
    }
}
