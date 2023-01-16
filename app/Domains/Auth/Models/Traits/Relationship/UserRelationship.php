<?php

namespace App\Domains\Auth\Models\Traits\Relationship;

use App\Domains\Auth\Models\PasswordHistory;
use App\Domains\Auth\Models\PersonalAccessToken as PAToken; 

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->morphMany(PasswordHistory::class, 'model');
    }

    public function personalAccessToken()
    {
        return $this->hasOne(PersonalAccessToken::class, 'id', 'tokenable_id');
    }
}
