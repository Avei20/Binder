<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{

    # Create reference to User Model

    public function user(){
        return $this->belongsTo('User', 'nim', 'nim');
    }

    # Create One to Many relationship with MatchedList Model

    public function matcheds(){
        return $this->hasMany('MatchedList', 'nimUser', 'nim');
    }

    # Create One to One relationship with detailAlamat Model

    public function alamat(){
        return $this->hasOne('detailAlamat', 'nim', 'nim');
    }

    # Create One to Many relationship with Hobi Model

    public function hobis(){
        return $this->hasmany('Hobi', 'nim', 'nim');
    }

    # Create One to One relationship with contact Model

    public function contact(){
        return $this->hasOne('contact', 'nim', 'nim');
    }


    # Create self references

    public function parent(){
        return $this->belongsTo('UserDetail', 'nim');
    }

    public function children(){
        return $this->hasOne('UserDetail', 'nim');
    }
}
