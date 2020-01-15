<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Refund extends Model
{
    //

    use SoftDeletes;

    protected $fillable = [
        'amount',
        'reason',
        'user_id',
        'refunded_payment',
        'order_id',
    ];
}
