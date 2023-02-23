<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    public function detail()
    {
        return $this->hasMany(InquiryDetail::class,'inquiry_id','id');        
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
    
    protected $fillable = [
        'name', 'email','year','notes'
    ];
}
