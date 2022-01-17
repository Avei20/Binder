<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'nim';
    protected $fillable = ['nim', 'nama', 'tempatLahir', 'tanggalLahir', 'gender', 'profilePhoto'];

    # Create reference to User Model

    public function user(){
        return $this->belongsTo(User::class, 'nim', 'nim');
    }

    # Create One to Many relationship with MatchedList Model

    public function matcheds(){
        return $this->hasMany(MatchedList::class, 'nimUser', 'nim');
    }

    # Create One to One relationship with detailAlamat Model

    public function alamat(){
        return $this->hasOne(detailAlamat::class, 'nim', 'nim');
    }

    # Create One to Many relationship with Hobi Model

    public function hobis(){
        return $this->hasmany(Hobi::class, 'nim', 'nim');
    }

    # Create One to One relationship with contact Model

    public function contact(){
        return $this->hasOne(contact::class, 'nim', 'nim');
    }


    # Create self references

    public function parent(){
        return $this->belongsTo(UserDetail::class, 'nim');
    }

    public function children(){
        return $this->hasOne(UserDetail::class, 'nim');
    }


}
