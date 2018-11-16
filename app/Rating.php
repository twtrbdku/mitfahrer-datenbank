<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User2Rating;

class Rating extends Model
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
        'points', 'description'
    ];

}
