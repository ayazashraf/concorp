<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
     /**
     * Get the photos for the business.
     */
    public function business_photos()
    {
        return $this->hasMany(BusinessPhoto::class,'business_id','id');
    }
    public function all_photos()
    {
        return $this->hasMany(Photo::class,'business_id','id');
    }
     /**
     * Get the unit type for the business.
     */
    public function type()
    {
        return $this->hasOne(BusinessType::class,'id','business_type_id');
        
    }
    public function detail()
    {
        return $this->hasOne(BusinessDetail::class,'business_id','id');
        
    }
    public function utility()
    {
        return $this->hasOne(BusinessUtility::class,'business_id','id');
        
    }
    
    public function amenity()
    {
        return $this->hasMany(BusinessAmenity::class,'business_id','id');        
    }
    public function itemamenity()
    {
        return $this->hasMany(ItemAmenity::class,'business_id','id');        
    }
      /**
     * Get the items for the business.
     */
    public function items()
    {
        return $this->hasMany(BusinessItem::class);
        
    }
    /**
     * Get the videos for the business.
     */
    public function videos()
    {
        return $this->hasMany(BusinessVideo::class);
        
    }
    
    public function nearby()
    {
        return $this->hasMany(Nearby::class,'business_id','id');        
    }

    protected $fillable = [
        'name', 'street_number','street_name','seo_title','url','metadescription','zip_postal','city','business_id'
    ];
}
