<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evolution extends Model
{
    use SoftDeletes;

    protected $guarded = [];
}
