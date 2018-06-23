<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pastes extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    /**
     * The attributes that should be cast as Carbon dates
     * 
     * @var array
     */
    protected $dates = ['deleted_at'];
}
