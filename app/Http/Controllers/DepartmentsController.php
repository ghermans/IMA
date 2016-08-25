<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class DepartmentsController
 * @package App\Http\Controllers
 */
class DepartmentsController extends Controller
{
    /**
     * DepartmentsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('lang');
    }

    /**
     * IMA Permissions - Department index.
     *
     * @url    GET|HEAD: /departments
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['departments'] = Department::paginate(15);
        return view('departments.index', $data);
    }

    /**
     * IMA Permissions - Create a new department.
     *
     * @url    GET|HEAD: /departments/create
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('');
    }

    /**
     * IMA Permissions - Store a new department.
     *
     * @url    POST:
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        return redirect()->back();
    }

    /**
     * IMA Permissions - Edit a department (form)
     *
     * @url    GET|HEAD:
     * @param  int $did the department id in the database.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($did)
    {
        return view();
    }

    /**
     * IMA Permissions - Update a department in the database.
     *
     * @url    POST:
     * @param  int $did the department id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($did)
    {
        return redirect()->back();
    }

    /**
     * IMA Permissions - Show a specific department.
     *
     * @url    GET|HEAD: /departments/show/{did}
     * @param  int $did the department id.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($did)
    {
        $data['department'] = Department::with('managers')->find($did);
        return view('', $data);
    }

    /**
     * IMA Permissions - Destroy a department out off the database.
     *
     * @url    GET|HEAD: /departments/destroy/{did}
     * @param  int $did the department id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($did)
    {
        return redirect()->back();
    }
}
