<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User2Journey extends Model
{
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
        'user_id', 'journey_id'
    ];

    /**
     * Return the user
     */
    public function user()
    {

    }

	/**
     * Return the user
     */
    public function journey()
    {

    }

}
