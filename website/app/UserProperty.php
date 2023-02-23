<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProperty extends Model
{
    protected $fillable = [
        'property_id', 'user_id', 'item_id', 'active'
    ];
    
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
        
    }
    public function busuiness()
    {
        return $this->hasOne(Business::class,'id','property_id');
        
    }
    public function unit()
    {
        return $this->hasOne(BusinessItem::class,'id','item_id');        
    }
}
