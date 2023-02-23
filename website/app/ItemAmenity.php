<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemAmenity extends Model
{    
    public function categories()
    {
        return $this->hasMany(ItemAmenityCategory::class,'id','category_id');        
                              
    }
}
