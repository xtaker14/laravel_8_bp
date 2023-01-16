<?php

namespace App\Domains\Auth\Models\Traits\Relationship;

// use App\Domains\Auth\Models\PersonalAccessToken as PAToken; 
use App\Domains\Auth\Models\User; 
/**
 * Class PersonalAccessTokenRelationship.
 */
trait PersonalAccessTokenRelationship
{
    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'tokenable_id', 'id');
    }
}
