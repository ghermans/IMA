<?php

namespace App\Http\Controllers;

use App\Notifications\ChangedAccountSettings;
use App\Notifications\ChangePassword;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Class AccountController
 * @package App\Http\Controllers
 */
class AccountController extends Controller
{
    /**
     * AccountController constructor.
     */
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
        // TODO: Account information -> Set validation to the view.
        return view('auth.profile');
    }

    /**
     * Update the account information.
     *
     * @url    POST: /profile/settings/information
     * @param  Requests\AccountInformation $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function StoreInformation(Requests\AccountInformation $input)
    {
        $user   = auth()->user();
        $update = User::find($user->id)->update($input->except('_token'));

        if ($update) {
            $user->notify(new ChangedAccountSettings());
        }

        session()->flash('message', 'Account information has been updated.');
        return redirect()->back();
    }

    /**
     * Update the account password.
     *
     * @url    POST: /profile/settings/password
     * @param  Requests\AccountPassword $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function StorePassword(Requests\AccountPassword $input)
    {
        $user = auth()->user();

        if (User::find($user->id)->update($input->except('_token'))) {
            $user->notify(new ChangePassword());
        }

        session()->flash('message', 'The account password has been updated');
        return redirect()->back();
    }


}
