<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WashingOrder extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_number',
        'customer',
        'coupon',
        'shipping_address',
        'order_status',
        'payment_status',
        'payment_method',
        'paid_amount',
        'paid_date',
        'date_completed',
        'items',
        'item_count',
        'pickup_agent',
        'store_agent',
        'washing_agent',
        'delivery_agent',
        'delivery_status',
        'delivery_date'
    ];


    public  function customer(){
        return $this->hasOne(User::class);
    }

    public  function store_agent(){
        return $this->hasOne(User::class);
    }

    public function store_delivery(){
        return $this->hasOne(User::class);
    }

    public function washing_agent(){
        return $this->hasOne(User::class);
    }

    public  function WashOrderItems(){
        return  $this->hasMany(WashOrderItem::class);
    }
}
