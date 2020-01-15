<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'price',
        'type',
        'discount_type',
        'description',
        'expiration_date',
        'usage_count',
        'individual_use',
        'service',
        'excluded_services',
        'usage_limit',
        'minimum_limit',
        'maximum_limit',
        'usage_limit_per_user',
    ];
}
