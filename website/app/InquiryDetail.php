<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InquiryDetail extends Model
{
    public function inquiry()
    {
        return $this->hasOne(Inquiry::class,'id','inquiry_id');        
    }
    protected $fillable = [
        'name', 'email','year','notes','inquiry_id'
    ];
}
