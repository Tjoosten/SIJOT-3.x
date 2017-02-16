<?php

namespace Sijot\Http\Controllers;

use Illuminate\Http\Request;
use Sijot\Branch;
use Sijot\Http\Requests\GroupValidator;

/**
 * Class GroupController
 *
 * @package Sijot\Http\Controllers
 */
class GroupController extends Controller
{
    /**
     * GroupController constructor.
     *
     * @return int|void|null
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view();
    }

    public function editGroup($id)
    {
        return view();
    }

    /**
     * Show the edit from for a group.
     *
     * @param  int $id The group id in the database.
     * @param  GroupValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateGroup(GroupValidator $input, $id)
    {
        if (Branch::find($id)->update($input->except('_token'))) { // The group update => OK
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'De groeps informatie is aangepast.');
        }

        return back();
    }

    /**
     * Show the information about a group in the organisation.
     *
     * @param   string $selector The database selector for the group.
     * @return  \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($selector)
    {
        $queryRel = function ($query) {
            $query->take(6);
        };

        $data['group'] = Branch::with(['activities' => $queryRel])->where('selector', $selector)->first();
        $data['title'] = $data['group']->title;

        return view('groups.front-end-show', $data);
    }
}
