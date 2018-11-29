<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault(function() {
            $user = new User();
            $user->name = "no one";
            $user->role = 0;
            return $user;
        });
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function logs()
    {
        return $this->hasMany('App\Log');
    }
}
