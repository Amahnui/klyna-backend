<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingZone extends Model
{
    //

    use SoftDeletes;

    protected  $fillable = [
        'zone_name',
        'cost',
    ];
}
