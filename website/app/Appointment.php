<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
    protected $fillable = [
        'name', 'phone','email','day','time','message','created_at','status','updated_at'
    ];
}
