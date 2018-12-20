<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait AuthScope
{

    /**
     * Scope a query to only include popular users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAuth($query)
    {
        return $query->where('user_id', '=', Auth::user()->id);
    }
}