<?php

namespace Sijot\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function subscribe()
    {
        $data['title'] = 'Inschrijven en lidgeld';
        return view('info.subscribe', $data);
    }
}
