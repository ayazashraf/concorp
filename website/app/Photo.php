<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function business_photo()
    {
        return $this->hasOne(BusinessPhoto::class, 'photo_id', 'id');
    }    
    public function item_photos()
    {
        return $this->hasMany(ItemPhoto::class, 'photo_id', 'id');
    }    
    public function business()
    {
        return $this->hasOne(Business::class, 'id', 'business_id');
    }    
}
