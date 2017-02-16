<?php

namespace Sijot\Http\Controllers;

use Illuminate\Http\Request;
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword()
    {
        return back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSettings()
    {
        return back();
    }
}
