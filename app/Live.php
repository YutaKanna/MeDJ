<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Live extends Model
{
    use SoftDeletes;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'lives';

    protected $dates = ['deleted_at'];
}
