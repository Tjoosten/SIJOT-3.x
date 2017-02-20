<?php

namespace Sijot\Http\Controllers;

use Illuminate\Http\Request;
use Sijot\Http\Requests\ApuKeyValidator;

class ApiKeysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * View for showing all the api keys in the system.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title'] = 'API sleutels';
        return view('api.backend-keys', $data);
    }

    /**
     * @param ApuKeyValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createKey(ApuKeyValidator $input)
    {
        $key['create'] = '';
        $key['update'] = '';

        if ($key['create'] && $key['update']) {

        }

        return back();
    }

    /**
     * Show the logs for a specific api key.
     *
     * @param  int $id the api key id in the database.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLog($id)
    {
        $data['title'] = 'API Logs';
        return view('', $data);
    }
}
