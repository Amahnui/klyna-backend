<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    //

    use SoftDeletes;

    protected  $fillable = [
        'type',
        'description',
        'cover_photo',
        'background_photo',
        'price',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public  function subscribers(){
        return $this->hasMany(User::class);
    }
}
