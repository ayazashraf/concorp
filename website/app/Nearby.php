<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nearby extends Model
{
    public function near_business()
    {
        return $this->hasOne(Business::class,'id','nearby_business_id');        
    }    
    
}
