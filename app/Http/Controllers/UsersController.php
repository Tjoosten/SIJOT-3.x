<?php

namespace Sijot\Http\Controllers;

use Illuminate\Http\Request;
use Sijot\User;

/**
 * Class UsersController
 *
 * @package     Sijot\Http\Controllers
 * @author      Tim Joosten <Topairy@gmail.com>
 * @copyright   Tim Joosten 2015-2017
 * @vesion      3.0.0
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

    /**
     * Block an user account in the system.
     *
     * @param  int $id the userid in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userBlock($id)
    {
        $user = User::findOrFail($id);

        if ($user->removeRole('active') && $user->assignRole('blocked')) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'De gebruikers is geblokkeerd');
        }

        return back();
    }

    /**
     * Unblock an user into the system.
     *
     * @param  int $id the userid in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userUnblock($id)
    {
        $user = User::findOrFail($id);

        if ($user->removeRole('blocked') && $user->assignRole('active')) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'De gebruiker is terug geactiveerd.');
        }

        return back();
    }

    /**
     * Delete a user in the system.
     *
     * @param   int $id The user id in the database.
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if (User::destroy($id)) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'De login is verwijderd.');
        }

        return back();
    }
}
