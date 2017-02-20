<?php

namespace Sijot\Http\Controllers;

use Illuminate\Http\Request;
use Sijot\Http\Requests\AccountSecurityValidator;
use Sijot\Http\Requests\AccountSettingsValidator;
use Sijot\Theme;
use Sijot\User;

/**
 * Class AccountController
 *
 * @package Sijot\Http\Controllers
 */
class AccountController extends Controller
{
    /**
     * AccountController constructor.
     *
     * @return int|null|void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the user profile.
     *
     * @see:unit-test   \Tests\Feature\AccountTest::testProfileView
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['user']   = User::find(auth()->user()->id);
        $data['themes'] = Theme::all();
        $data['title']  = $data['user']->name;

        return view('account.back-end-index', $data);
    }

    /**
     * Update the password for the authencated user.
     *
     * @see:unit-test  \Tests\Feature\AccountTest::testUpdatePasswordValidationErr
     * @see:unit-test  \Tests\Feature\AccountTest::testUpdatePasswordNoValidationErr
     *
     * @param   AccountSecurityValidator $input
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(AccountSecurityValidator $input)
    {
        $userId = auth()->user()->id;
        $filter = ['_token', 'password_confirmation'];

        if (User::find($userId)->update($input->except($filter))) { // The password has been updated.
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'Account wachtwoord is aangepast.');
        }

        return back();
    }

    /**
     * Update the account settings for the authencated user.
     *
     * @see:unit-test   \Tests\Feature\AccountTest::testUpdateSettingsValidationErr
     * @see:unit-test   \Tests\Feature\AccountTest::testUpdateSettingsNoValidationErr
     *
     * @param  AccountSettingsValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSettings(AccountSettingsValidator $input)
    {
        if (User::find(auth()->user()->id)->update($input->except('_token'))) { // The account information => updated.
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'De account informatie is aangepast.');
        }

        return back();
    }
}
