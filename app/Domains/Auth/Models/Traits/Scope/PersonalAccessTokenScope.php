<?php

namespace App\Domains\Auth\Models\Traits\Scope;

/**
 * Class PersonalAccessTokenScope.
 */
trait PersonalAccessTokenScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where(function ($query) use ($term) {
            $query->where('tokenable_id', 'like', '%'.$term.'%')
                ->orWhere('name', 'like', '%'.$term.'%')
                ->orWhere('token', 'like', '%'.$term.'%');
        });
    } 
}
