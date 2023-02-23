<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessDetail extends Model
{

    public function business()
    {
        return $this->hasOne(Business::class,'business_id','id');        
    }
    public $timestamps = false;
    protected $fillable = [
        'number_of_units', 'business_id','street_name','seo_title','seo_url','metadescription','zip_postal','seo_keywords'
    ];
}
