<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User as User;

class ProfileController extends Controller{

    /**
     * Show user view if user exists.
     *
     * @param $username
     * @return mixed
     */
    public function show($username)
    {
        $user = User::where('username', $username)->get();

        if($user->count())
        {
            return view('profile.show')->with('user', $user->first());
        }

        return App::abort(404);
    }
}