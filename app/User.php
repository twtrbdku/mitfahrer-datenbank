<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User2Journey;
use App\User2Rating;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    const GENDER = [
        0 => 'weiblich',
        1 => 'männlich',
    ];

    /**
     * The attributes that are not assignable.
     *
     * @var array
     */
    protected $guarded = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender',
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
     * Return all journeys the user offered
     */
    public function offeredJourneys()
    {

    }

    /**
     * Return all journeys the user booked
     */
    public function bookedJourneys()
    {

    }

    /**
     * Return all ratings send by the user
     */
    public function ratings()
    {

    }

    /**
     * Return all received ratings of the user
     */
    public function receivedRatings()
    {

    }

    /**
     * Return all ratings sent by the user
     */
    public function sentRatings()
    {

    }

}
