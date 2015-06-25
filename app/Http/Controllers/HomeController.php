<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class HomeController extends Controller
{
    /**
     * Returns home page content. Calls home page view.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('welcome');
    }

    public function search()
    {
        return "SEARCH";
    }

    public function support()
    {
        return "Support section!";
    }
}