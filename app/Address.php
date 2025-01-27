<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    //
    use SoftDeletes;

    protected $fillable =[
        'region',
        'division',
        'sub_division',
        'city',
        'municipality',
        'quarter',
        'address',
        'backup_telephone_number'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
