<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestValidator;
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
        $relations = ['status', 'employee', 'requester'];
        $data['requests'] = RequestsDb::with($relations)->paginate(15);

        return view('requests.index', $data);
    }

    /**
     * Get the request created by the logged in user.
     *
     * @url    GET|HEAD: /requests/me
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myRequests()
    {
        $user = auth()->user();
        $data['requests'] = RequestsDb::where('requester_id', $user->id)->paginate(15);

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

    /**
     * Create a new request.
     *
     * @url    POST: /requests/register
     * @param  RequestValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RequestValidator $input)
    {
        $user = auth()->user();

        $request = new RequestsDb;
        $request->description = $input->description;
        $request->employee()->associate($input->employee);
        $request->requester()->associate($user->id);
        $request->status()->associate(1); // 1 = label -> new


        if ($request->save()) {
            session()->flash('message', 'Permission request created.');
            session()->flash('class', 'alert alert-success');
        } else {
            session()->flash('message', 'Could not create the permission request.');
            session()->flash('class', 'alert alert-danger');
        }

        return redirect()->back();
    }

    /**
     * @param  int $id The request id in the database.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $relations = ['status', 'employee', 'requester', 'comments'];
        $data['request'] = RequestsDb::with($relations)->find($id);

        return view('requests.show', $data);
    }

    /**
     * Update view for a permission request.
     *
     * @url    GET|HEAD:
     * @param  int $id The request id in the database.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('');
    }

    /**
     * Update a request item in the database.
     *
     * @url    POST:
     * @param  RequestValidator $input
     * @param  int $id the request id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RequestValidator $input, $id)
    {
        RequestsDb::find($id)->update($input->except('_token'));

        session()->flash('class', 'alert alert-success');
        session()->flash('message', 'Permission request has been updated');

        return redirect()->back();
    }

    /**
     * Change the status off a permission request.
     *
     * @url    POST:
     * @param  int $id the request id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus($id)
    {
        return redirect()->back();
    }

    /**
     * Delete a request in the database
     *
     * @url    GET|HEAD: /requests/destroy/{id}
     * @param  int $id , Request id in the database
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        RequestsDb::destroy($id);

        session()->flash('message', 'Request has been deleted');
        session()->flash('class', 'alert alert-succes');

        return redirect()->back();
    }
}
