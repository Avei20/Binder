<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{

    use HasFactory;
    public $timestamps = false;
    public $table = 'Hobi';

    # Create reference to UserDetail Model

    public function detail(){
        return $this->belongsTo('UserDetail', 'nim', 'nim');
    }
}
