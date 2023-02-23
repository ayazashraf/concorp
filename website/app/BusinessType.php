<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    /**
     * Get the post that owns the business.
     */
    public function business()
    {
        return $this->belongsTo(Business::class, 'id', 'business_id');
    }
    public function children()
    {
        return $this->hasMany(BusinessType::class,'parent_id');   
    }
    public function subcategory(){
        return $this->hasMany('App\BusinessType', 'parent_id');
    }
}
