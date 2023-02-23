<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessItem extends Model
{
    /**
     * Get the Business that owns the Items.
     */
    public function business()
    {
        return $this->hasOne(Business::class,'id','business_id');        
    }
     /**
     * Get the photos for the Item(unit)
     */
    public $timestamps = false;
    public function photos()
    {
        return $this->hasMany(ItemPhoto::class,'item_id','id');
    }

    public function videos()
    {
        return $this->hasMany(ItemVideo::class,'item_id','id');
    }

    public function amenity()
    {
        return $this->hasMany(ItemAmenity::class,'business_id','business_id');        
    }

    public function type()
    {
        return $this->hasOne(BusinessItemType::class,'id','item_type_id');        
    }

    protected $fillable = [
        'name','id','business_id'
    ];
}
