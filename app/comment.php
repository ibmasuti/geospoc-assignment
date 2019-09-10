<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function jobseeker()
    {
        return $this->belongsTo('App\jobseeker', 'jobseeker_id');
    }

}
