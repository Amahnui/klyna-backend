<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    //

    protected $fillable =[
        'service',
        'request_date',
        'telephone_number'
    ];
}
