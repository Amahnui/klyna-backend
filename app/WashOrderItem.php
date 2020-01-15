<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WashOrderItem extends Model
{
    protected $fillable =[
            'washing_order',
            'wash_item',
            'quantity'
    ];

    public function wash_item() {
        return $this->hasOne(WashItem::class);
    }
}
