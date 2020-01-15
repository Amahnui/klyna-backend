<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    //

    use SoftDeletes;

    protected $fillable = [
        'rating',
        'body',
        'user_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function package(){
        return $this->belongsTo(Package::class);
    }
    
    public function customer() {
        return $this->belongsTo(User::class);
    }
}
