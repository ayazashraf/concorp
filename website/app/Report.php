<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function business()
    {
        return $this->belongsTo(Business::class);
    }    
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
        
    }
}
