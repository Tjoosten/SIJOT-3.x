<?php

namespace Sijot\Http\Controllers;

use Illuminate\Http\Request;
use Sijot\Activity;
use Sijot\News;

/**
 * Class HomeController
 *
 * @package Sijot\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * HomeController Constructor
     *
     * @return int|void|null
     */
    public function __constrcut()
    {
        $this->middleware('auth')->only(['indexBackend']);
    }

    /**
     * The index page for this website.
     *
     * @see:unit-test   \T6ests\Feature\HomeTest::testHomeFrontEnd
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexFront()
    {
        $data['title']    = 'Index';
        $data['activity'] = Activity::take(6);
        $data['news']     = News::paginate(15);

        return view('home', $data);
    }

    /**
     * Get the backend index panel.
     *
     * @see:unit-test   \Tests\Feature\HomeTest::testHomeBackend
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexBackend()
    {
        $data['title'] = 'Controle paneel';
        return view('backend-home', $data);
    }
}
