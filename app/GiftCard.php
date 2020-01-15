<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiftCard extends Model
{
    //

    use SoftDeletes;

    protected $fillable = [
        'code',
        'service',
        'price',
        'expiration_date',
        'is_used'
    ];
}
