<?php

namespace App;

use Jenssegers\Mongodb\Model as Eloquent;

class Player extends Eloquent
{
    protected $collection  = 'users';
}
