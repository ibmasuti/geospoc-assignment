<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobseeker extends Model
{
   public function comment()  {

        return $this->hasOne('App\comment');
    }
}
