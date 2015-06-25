<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Subscription;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Process sign in GET request.
     *
     * @return \Illuminate\View\View
     */
    public function getSignIn()
    {
        return view('account.signin');
    }

    /**
     * Process sign in post requests.
     *
     * @param Request $request
     * @return mixed
     */
    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|max:50|email',
            'password'  => 'required|min:6',
        ]);

        $remember = ($request->has('remember')) ? true : false;
        $auth = Auth::attempt([
            'email'    => $request['email'],
            'password' => $request['password'],
            'active'   => 1
        ], $remember);

        if ($auth)
        {
            return Redirect::intended('/');
        }
        else
        {
            return Redirect::route('account-sign-in')->with(
                'global-error',
                'Email/password wrong, or acount not activated.'
            );
        }
    }

    /**
     * Process sign out GET request.
     *
     * @return mixed
     */
    public function getSignOut()
    {
        Auth::logout();
        return Redirect::route('home');
    }

    /**
     * Proces create GET request.
     *
     * @return \Illuminate\View\View
     */
    public function getCreate()
    {
        return view('account.create');
    }

    /**
     * Process create POST request.
     *
     * @param CreateUserRequest $request
     * @return mixed
     */
    public function postCreate(CreateUserRequest $request)
    {
        // Generate activation code
        $code = str_random(60);

        // Create a new user
        $user = new User;
        $user->email = $request['email'];
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->username = $request['username'];
        $user->password = Hash::make($request['password']);
        $user->code = $code;
        $user->active = 0;

        if ($user->save())
        {
            Mail::send(
                'emails.auth.activate',
                array('link' => URL::route('account-activate', $code), 'username' => $request['username']),
                function ($message) use ($user)
                {
                    $message->to($user->email, $user->username)->subject('Acctivate your account');
                }
            );

            return Redirect::route('home')->with(
                'global',
                'Your account has been created! We have sent you an email to activate your account!'
            );
        }
    }

    /**
     * Process active GET request.
     *
     * @param $code
     * @return mixed
     */
    public function getActivate($code)
    {
        $user = User::where('code', $code)->where('active', 0);

        if ($user->count())
        {
            $user = $user->first();

            // Update user to active
            $user->active = 1;
            $user->code   = '';

            if ($user->save())
            {
                return Redirect::route('home')->with('global', 'Activated. You can now sign in!');
            }
        }
        return Redirect::route('home')->with('global', 'We could not activate your acount. Try again later.');
    }

    /**
     * Process change passrowd GET request.
     *
     * @return mixed
     */
    public function getChangePassword()
    {
        return view('account.password');
    }

    /**
     * Process change password POST request.
     *
     * @param Request $request
     * @return mixed
     */
    public function postChangePassword(Request $request)
    {
        $this->validate($request, [
            'old_password'   => 'required',
            'password'       => 'required|min:6',
            'password_again' => 'required|same:password'
        ]);

        $user = User::where('email', Auth::user()->email)->get()->first();

        if (isset($user))
        {
            if (Hash::check($request['old_password'], $user->getAuthPassword()))
            {
                $user->password = Hash::make($request['password']);
                if ($user->save())
                {
                    return Redirect::route('home')->with(
                        'global',
                        'Your password has been changed!'
                    );
                }
            }
            else
            {
                return Redirect::route('account-change-password')->with(
                    'global',
                    'Your old password is inccorect.'
                );
            }
        }
        else
        {
            return Redirect::route('account-change-password')->with(
                'global',
                'Your password could not be changed.'
            );
        }
    }

    /**
     * Process forget password GET request.
     *
     * @return mixed
     */
    public function getForgotPassword()
    {
        return view('account.forgot');
    }

    /**
     * Process forget password POST request.
     *
     * @param Request $request
     * @return mixed
     */
    public function postForgotPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);
        $user = User::where('email', $request['email']);

        if ($user->count())
        {
            $user = $user->first();

            // Generate a new code and password
            $code     = str_random(60);
            $password = str_random(10);

            $user->code          = $code;
            $user->password_temp = Hash::make($password);

            if ($user->save())
            {
                Mail::send(
                    'emails.auth.forgot',
                    array('link' => URL::route('account-recover', $code),
                    'username' => $user->username, 'password' => $password),
                    function ($message) use ($user)
                    {
                        $message->to($user->email, $user->username)->subject('Your new password');
                    }
                );
                return Redirect::route('home')->with(
                    'global',
                    'We have sent you a new password by email.'
                );
            }
        }
        return Redirect::route('account-forgot-password')->with(
            'global',
            'Could not request new password.'
        );
    }

    /**
     * Process recover new password GET request.
     *
     * @param $code
     * @return mixed
     */
    public function getRecover($code)
    {
        $user = User::where('code', $code)->where('password_temp', '!=', '');

        if ($user->count())
        {
            $user = $user->first();

            // Update user details
            $user->password      = $user->password_temp;
            $user->password_temp = '';
            $user->code          = '';

            if ($user->save())
            {
                return Redirect::route('home')->with(
                    'global',
                    'Your account has been recovered and you can sign in with your new password.'
                );
            }
        }
        return Redirect::route('home')->with('global', 'Could not recover your account!');
    }

    /**
     * Subscribe user with POST request.
     *
     * @param Request $request
     * @return mixed
     */
    public function postSubscription(Request $request)
    {
        $validator = Validator::make($request->all(),
            array(
                'sub_email' => 'required|email|unique:subscriptions'
            ),
            array(
                'sub_email.required' => 'Please enter an e-mail address!',
                'sub_email.email'    => 'Please enter an correct e-mail address!',
                'sub_email.unique'   => 'Your already subscribed, please enter a different e-mail address!'
            )
        );

        if ($validator->fails())
        {
            return Redirect::route('home')->with('msg-error', 'Bad Email!')->withErrors($validator);
        }
        else
        {
            $s_email = new Subscription();
            $s_email->sub_email = $request['sub_email'];
            $s_email->user_ip = $request->getClientIp();

            if ($s_email->save()) {
                return Redirect::route('home')->with(
                    'msg-success',
                    'Your successfully subscribed with: <strong>' . $request['sub_email'] . '</strong>'
                );
            }
        }

        return Redirect::route('home')->with(
            'global',
            'There was an error with sign in. Please try again later!'
        );
    }
}