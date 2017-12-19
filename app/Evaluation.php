<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function evolutions()
    {
        return $this->hasMany('App\Evolution')->latest();
    }

    public function scopeFilter($query, Request $request = null)
    {
        $request = $request ?: request();

        if ($request->has('q')) {
            $query->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', "%{$request->q}%")
                    ->orWhere('address', 'LIKE', "%{$request->q}%")
                    ->orWhere('state', 'LIKE', "%{$request->q}%")
                    ->orWhere('city', 'LIKE', "%{$request->q}%")
                    ->orWhere('zipcode', 'LIKE', "%{$request->q}%");
            });
        }

        return $query;
    }
}

