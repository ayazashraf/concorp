<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
    public function amenity()
    {
        return $this->hasMany(ItemAmenity::class,'business_id','id');        
    }
    protected $fillable = [
        'title', 'summary','description','seotitle','url','metadescription','seo_bots','status','keywords','featured_image'
    ];
}
