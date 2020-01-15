<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactForm extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'subject',
        'telephone',
        'email',
        'message',
    ];

}
