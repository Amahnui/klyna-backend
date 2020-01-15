<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;

    protected  $fillable = [
        'name',
        'description',
        'regular_price',
        'sale_price',
        'start_sale',
        'end_sale',
        'SKU',
        'quantity',
        'stock_threshold',
    ];

    public function packages(){
        return $this->belongsToMany(Package::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
