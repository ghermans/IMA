<?php

namespace App\Http\Controllers;

use App\Permissions;
use App\Requests as RequestsDb;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class RequestController
 * @package App\Http\Controllers
 */
class RequestController extends Controller
{
    // TODO: create unit tests

    /**
     * RequestController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('lang');
    }

    /**
     * IMA Permissions - requests overview.
     *
     * @url    GET|HEAD: /requests
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['requests'] = RequestsDb::paginate(15);
        return view('requests.index', $data);
    }

    /**
     * IMA Permissions - Create request
     *
     * @url    GET|HEAD: /requests/register
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data['users'] = User::all();
        $data['perms'] = Permissions::all();

        return view('requests.create', $data);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function changeStatus($id)
    {

    }

    public function destroy($id)
    {
        //
    }
}
