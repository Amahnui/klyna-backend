<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WashItem extends Model
{
    //

    use softDeletes;

    protected  $fillable = [
        'name',
        'image',
        'category',
        'point_equivalence',
        'price'
    ];
}
