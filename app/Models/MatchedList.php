<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchedList extends Model
{

    # Create reference to UserDetail Model
    protected $table = 'matched_list';
    public function detail(){
        return $this->belongsTo(UserDetail::class,'nim','nimUser');
    }
}
