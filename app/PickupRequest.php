<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PickupRequest extends Model
{
    //

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'attended_to',
        'agent_id',
    ];

    public function user(){
        return $this->belongsTo( User::class);
    }
}
