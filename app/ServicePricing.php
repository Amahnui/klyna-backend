<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicePricing extends Model
{
    //

    use SoftDeletes;

    protected $fillable = [
        'name',
        'category',
        'start_price',
        'sale_price',
        'start_sale',
        'end_sale',
    ];
}
