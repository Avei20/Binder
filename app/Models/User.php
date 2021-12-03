<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    
    # Create reference to UserDetail Model

    public function detail(){
        return $this->hasOne('UserDetail', 'nim', 'nim');
    }
}
