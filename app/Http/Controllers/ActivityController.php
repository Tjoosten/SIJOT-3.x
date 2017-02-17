<?php

namespace Sijot\Http\Controllers;

use Illuminate\Http\Request;
use Sijot\Activity;
use Sijot\Branch;
use Sijot\Http\Requests\ActivityValidator;

/**
 * Class ActivityController
 *
 * @package Sijot\Http\Controllers
 */
class ActivityController extends Controller
{
    /**
     * ActivityController constructor.
     *
     * @return int|void|null
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * The backend for the activities.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function backend()
    {
        $data['title']      = 'Activiteiten';
        $data['groups']     = Branch::all();
        $data['activities'] = Activity::paginate(15);

        return view('activity.back-end-index', $data);
    }

    /**
     * Store a freshly created activity in the database.
     *
     * @param  ActivityValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ActivityValidator $input)
    {
        $filter = $input->except(['group', '_token']);

        $MySQL['create']   = Activity::create($filter);
        $MySQL['relation'] = Activity::find($MySQL['create']->id)->group()->attach($input->get('group'));

        if ($MySQL['create'] && $MySQL['relation']) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'De activiteit is opgeslagen.');
        }

        return back(); // 302 Redirect
    }

    /**
     * Soft delete a activity out off the system.
     *
     * @param  int $id The id for the activity in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if (Activity::find($id)->delete()) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'De activiteit is verwijderd');
        }
        return back();
    }

    /**
     * Edit view for an activity.
     *
     * @param  int $id The id for the activity in the database.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view();
    }

    /**
     * @param  int $id The id for the activity in the database.
     * @param  ActivityValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ActivityValidator $input, $id)
    {
        return back();
    }

    /**
     * The backend show for an activity.
     *
     * @param  int $id The id for the activity in the database.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showBackend($id)
    {
        return view();
    }

    /**
     * The json response used by the ajax call in the frontend.
     *
     * @param  int $id The id for the activity in the database.
     * @return \Illuminate\Http\JsonResponse
     */
    public function showFrontEnd($id)
    {
        $data = Activity::findOrFail($id);
        return response()->json($data);
    }
}
