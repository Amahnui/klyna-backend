<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    //

    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'order_id',
        'price',
        'type',
    ];
}
