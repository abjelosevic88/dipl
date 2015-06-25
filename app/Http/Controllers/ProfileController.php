<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User as User;
use Illuminate\Support\Facades\Config;

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
        $s_config = Config::get('social.networks');
        if($user->count())
        {
            return view('profile.show')->with([
                'user'      =>  $user->first(),
                's_config'  =>  $s_config
            ]);
        }
        return App::abort(404);
    }

    public function edit($username)
    {
        $user = User::where('username', $username)->get();
        $s_config = Config::get('social.networks');
        if($user->count())
        {
            return view('profile.edit')->with([
                'user'      =>  $user->first(),
                's_config'  =>  $s_config
            ]);
        }
        return App::abort(404);
    }
}