<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'message',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
