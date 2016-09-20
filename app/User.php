<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Support\Facades\Config;
use Jenssegers\Mongodb\Model as Eloquent;

class User extends Eloquent implements AuthenticatableContract
{
    use Authenticatable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $collection = 'users';

    /**
     * Create acive users query scope.
     *
     * @param $query
     */
    public function scopeActive($query) {
        $query->where("active", 1);
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    /**
     * Gets profile picture attribute. If value is empty use default picture.
     */
    public function getProfilePictureAttribute()
    {
//        die("<pre>".print_r(Config::get("global_test.testStr"), true)."</pre>");
        if (empty($this->attributes['profile_picture']))
        {
            return asset(env('USER_DEFAULT_PICTURE_PATH'));
        }
    }
}

