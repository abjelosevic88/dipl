<?php

use \App\Player as Player;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Home page (GET)
Route::get('/', array(
    'as' => 'home',
    'uses' => 'HomeController@home'
));

// Search page (POST)
Route::post('search', array(
    'as'	=>	'search',
    'uses'	=>	'HomeController@search'
));

// User profile (GET)
Route::get('/user/{username}', array(
    'as'	=>	'profile-user',
    'uses'	=>	'ProfileController@user'
));

// Support page (GET)
Route::get('support', array(
    'as'	=>	'support',
    'uses'	=>	'HomeController@support'
));

// Basic user auth controllers
//Route::controllers([
//    'auth'  =>  'Auth\AuthController',
//    'password'  =>  'Auth\PasswordController'
//]);

/*
| Authenticated group
*/
Route::group(array('before' => 'auth'), function()
{
    // CSRF protection
    Route::group(array('before' => 'csrf'), function()
    {
        // Change password (POST)
        Route::post('/account-change-password', array(
            'as' 	=> 'account-change-password-post',
            'uses' 	=> 'AccountController@postChangePassword'
        ));
    });

    // Change password (GET)
    Route::get('/account-change-password', array(
        'as' 	=> 'account-change-password',
        'uses' 	=> 'AccountController@getChangePassword'
    ));

    // Sign out (GET)
    Route::get('/account/sign-out', array(
        'as' 	=> 'account-sign-out',
        'uses'	=> 'AccountController@getSignOut'
    ));

    // Show Profile page
    Route::get('/account/show/{username}', [
        'as'    =>  'account-show',
        'uses'  =>  'ProfileController@show'
    ]);

    // Edit Profile page
    Route::get('/account/show/{username}/edit', [
        'as'            =>  'account-edit',
        'uses'          =>  'ProfileController@edit',
        'middleware'    =>  'user-edit-profile'
    ]);

    // Admin page
//    Route::get('admin', array(
//        'as'	=>	'admin',
//        'uses'	=>	'AdminController@index'
//    ));
});

/*
| Unauthenticated group
*/
Route::group(array('before' => 'guest'), function()
{

    // CSRF protection
    Route::group(array('before' => 'csrf'), function()
    {

        // Create account (POST)
        Route::post('/account/create', array(
            'as' => 'account-create-post',
            'uses' => 'AccountController@postCreate'
        ));

        // Sign in (POST)
        Route::post('/account/sign-in', array(
            'as' => 'account-sign-in-post',
            'uses' => 'AccountController@postSignIn'
        ));

        // Forgot password (GET)
        Route::post('/account/forgot-password', array(
            'as'	=>	'account-forgot-password-post',
            'uses'	=>	'AccountController@postForgotPassword'
        ));

        // Footer Email Subscription
        Route::post('/account/subscribe', array(
            'as'	=>	'account-subscribe',
            'uses'	=>	'AccountController@postSubscription'
        ));
    });

    // Forgot password (GET)
    Route::get('/account/forgot-password', array(
        'as'	=>	'account-forgot-password',
        'uses'	=>	'AccountController@getForgotPassword'
    ));

    // Recover password (GET)
    Route::get('/account/recover/{code}', array(
        'as'	=>	'account-recover',
        'uses'	=>	'AccountController@getRecover'
    ));

    // Sign in (GET)
    Route::get('/account/sign-in', array(
        'as' => 'account-sign-in',
        'uses' => 'AccountController@getSignIn'
    ));

    // Create account (GET)
    Route::get('/account/create', array(
        'as' => 'account-create',
        'uses' => 'AccountController@getCreate'
    ));

    // Activate account (GET)
    Route::get('/account/activate/{code}', array(
        'as' 	=>	'account-activate',
        'uses'	=> 	'AccountController@getActivate'
    ));
});