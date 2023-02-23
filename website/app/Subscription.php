<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'name', 'status','email','verify_code','is_verified','created_at','modified_at','status'
    ];
}
