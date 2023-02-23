<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPhoto extends Model
{
    /**
     * Get the Item by ItemPhoto
     */
    public function item()
    {        
        return $this->hasOne(BusinessItem::class,'id','item_id');
    }
    public $timestamps = false;
    public function photos()
    {
        return $this->hasMany(Photo::class,'id','photo_id');        
    }

    protected $fillable = [
        'item_id', 'photo','name','description','alt'
    ];
}
