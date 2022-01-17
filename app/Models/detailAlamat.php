<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailAlamat extends Model
{

    # Create reference to UserDetail Model
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detail_alamat';


    public function detail(){
        return $this->belongsTo(UserDetail::class, 'nim', 'nim');
    }
}
