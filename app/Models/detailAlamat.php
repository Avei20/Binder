<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detailAlamat extends Model
{

    # Create reference to UserDetail Model
    public $timestamp = False;


    public function detail(){
        return $this->belongsTo('UserDetail', 'nim', 'nim');
    }
}
