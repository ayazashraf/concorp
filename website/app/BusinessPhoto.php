<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessPhoto extends Model
{
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
    public $timestamps = false;
    
    public function photos()
    {
        return $this->hasMany(Photo::class,'id','photo_id');        
    }

    protected $fillable = [
        'business_id', 'photo','name','description','alt'
    ];
}
