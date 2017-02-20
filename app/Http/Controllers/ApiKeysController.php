<?php

namespace Sijot\Http\Controllers;

use Chrisbjr\ApiGuard\Models\ApiKey;
use Chrisbjr\ApiGuard\Models\ApiLog;
use Illuminate\Http\Request;
use Sijot\Http\Requests\ApuKeyValidator;
use Sijot\User;

class ApiKeysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * View for showing all the api keys in the system.
     *
     * @see:unit-test   \Tests\Feature\ApiKeyManagementTest::testKeyIndexNoData
     * @see:unit-test   TODO: Build test up with api key data.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // TODO: Build up the view part for the api keys.

        $data['title'] = 'API sleutels';
        $data['keys']  = ApiKey::paginate(15);
        $data['users'] = User::all();

        return view('api.backend-keys', $data);
    }

    /**
     * Create a new api key in the system.
     *
     * @param ApuKeyValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createKey(ApuKeyValidator $input)
    {
        $key['create'] = '';
        $key['update'] = '';

        if ($key['create'] && $key['update']) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'De api sleutel is aangemaakt.');
        }

        return back();
    }

    /**
     * Delete some api key in the system.
     *
     * @see:unit-test   \Feature\Tests\ApiKeyManagementTest::testKeyDeleteKey
     *
     * @param  int $id the api key id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteKey($id)
    {
        $key['delete']  = ApiKey::find($id)->delete();
        $key['logs']    = ApiLog::where('api_key_id', $id)->delete();

        if ($key['logs'] && $key['delete']) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'De api sleutel is verwijderd.');
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
