<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User2Rating extends Model
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
        'user_id', 'journey_id', 'to_user_id', 'rating_id'
    ];

    /**
     * Return the sending user
     */
    public function sender()
    {

    }

    /**
     * Return the receiving user
     */
    public function receiver()
    {

    }

    /**
     * Return the rating
     */
    public function rating()
    {

    }

    /**
     * Return the journey
     */
    public function journey()
    {

    }
}
