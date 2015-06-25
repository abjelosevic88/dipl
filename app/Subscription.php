<?php

namespace App;

use Jenssegers\Mongodb\Model as Eloquent;

class Subscription extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $collection = 'subscriptions';
}
