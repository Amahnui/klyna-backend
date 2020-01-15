<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    //

    use SoftDeletes;

    protected $fillable = [
        'position',
        'department',
        'role_summary',
        'responsibilities',
        'qualifications',
        'is_open',
    ];
}
