<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'referrer_id',
        'email',
        'password',
        'role',
        'avatar',
        'primary_language',
        'credit_score',
        'last_login_at',
        'last_login_ip',
        'device',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * A user has a referrer.
     *
     * @return BelongsTo
     */
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id', 'id');
    }

    /**
     * A user has many referrals.
     *
     * @return HasMany
     */
    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id');
    }

    /**
     * A user has many addresses.
     *
     * @return HasMany
     */
    public function address(){
        return $this->hasMany(Address::class);
    }

    /**
     * A user has many pickup requests.
     *
     * @return HasMany
     */
    public function pickupRequests(){
        return $this->hasMany(PickupRequest::class);
    }

    /**
     * A user has many washing orders.
     *
     * @return HasMany
     */
    public function washingOrders(){
        return $this->hasMany(WashingOrder::class);
    }
}
