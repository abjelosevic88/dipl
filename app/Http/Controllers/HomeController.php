<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

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

    /**
     * Returns search view content.
     * 
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $users = User::where('username', 'like', '%' . $search . '%')
            ->orWhere('first_name', 'like', '%' . $search . '%')
            ->orWhere('last_name', 'like', '%' . $search . '%')
            ->get()->toArray();

        return view('global.search')->with([
            'users'     =>  $users,
            'search'    =>  $search
        ]);
    }

    public function support()
    {
        return "Support section!";
    }
}