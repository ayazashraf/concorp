<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    public function business()
    {        
        return $this->hasOne(Business::class,'id','reference_id');
    }
    protected $fillable = [
        'name', 'testimonial','status','date_recorded'
    ];
}
