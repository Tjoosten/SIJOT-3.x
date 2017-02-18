<?php

namespace Sijot\Http\Controllers;

use Illuminate\Http\Request;
use Sijot\User;

/**
 * Class UsersController
 *
 * @package Sijot\Http\Controllers
 */
class UsersController extends Controller
{
    /**
     * UsersController constructor.
     *
     * @return int|void|null
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the backend user control panel.
     *
     * @see:unit-test \Tests\Feature\AuthencationTest::testLoginBackendIndex
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title'] = 'Login management.';
        $data['users'] = User::paginate(15);

        return view('users.login-index', $data);
    }

    public function destroy($id)
    {
        if (User::destroy($id)) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'De login is verwijderd.');
        }

        return back();
    }
}
