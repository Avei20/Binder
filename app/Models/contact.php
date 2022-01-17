<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    # Create reference to UserDetail Model
    public $timestamps = false;
    public function detail(){
        return $this->belongsTo(UserDetail::class, 'nim', 'nim');
    }
}
