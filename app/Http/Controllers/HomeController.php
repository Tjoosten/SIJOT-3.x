<?php

namespace Sijot\Http\Controllers;

use Illuminate\Http\Request;

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
     * ROUTE:   home
     * URL:     http://www.st-joris-turnhout.be
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexFront()
    {
        $data['title']    = 'Index';
        $data['activity'] = '';
        $data['news']     = '';

        return view('home', $data);
    }

    /**
     * Get the backend index panel.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexBackend()
    {
        $data['title'] = 'Controle paneel';
        return view('backend-home', $data);
    }
}
