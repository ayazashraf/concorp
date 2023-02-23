<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessUtility extends Model
{
    public function business()
    {
        return $this->hasOne(Business::class,'id','business_id');        
    }
    public $timestamps = false;
    protected $fillable = [
        'heat', 'business_id','water','electricity','parking_details','pet_friendly','small_dogs_friendly','large_dogs_friendly','cat_friendly','No_pets_allowed'
    ];
}
