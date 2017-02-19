<?php

namespace Sijot\Http\Controllers;

use Sijot\News;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function subscribe()
    {
        $data['title'] = 'Inschrijven en lidgeld';
        $data['news']  = News::take(6)->get();
        return view('info.subscribe', $data);
    }
}
