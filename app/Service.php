<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected  $fillable = [
        'name',
        'description'
    ];

    public function pricing(){
        return $this->hasMany(ServicePricing::class);
    }
}
