<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
	/**
     * The attributes that are not assignable.
     *
     * @var array
     */
    protected $guarded = [
    	'created_at', 'updated_at', 'deleted_at'
    ];
}
