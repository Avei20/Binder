<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{

    # Create reference to UserDetail Model

    public function detail(){
        return $this->belongsTo('UserDetail', 'nim', 'nim');
    }
}
