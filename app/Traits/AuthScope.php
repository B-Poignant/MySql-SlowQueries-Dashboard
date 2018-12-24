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
        if (is_a($query->getModel(), 'App\Project')) {
            return $query->leftjoin('user_role_project',function($leftJoin)
            {
                $leftJoin->on('projects.id', '=', 'user_role_project.project_id')/*->joinWhere()*/;
            })->where('user_role_project.user_id', Auth::user()->id);
        }else{
            return $query->where('user_id', '=', Auth::user()->id);
        }
    }
}