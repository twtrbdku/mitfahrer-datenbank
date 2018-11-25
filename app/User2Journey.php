<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User2Journey extends Model
{
    use SoftDeletes;
    
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

    protected $table = "users_journeys";

    /**
     * Return the user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

	/**
     * Return the user
     */
    public function journey()
    {
        return $this->belongsTo('App\Journey');
    }

}
