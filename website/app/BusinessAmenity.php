<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessAmenity extends Model
{
 
    public function categories()
    {
        return $this->hasMany(BusinessAmenityCategory::class,'id','category_id');        
    }
}
