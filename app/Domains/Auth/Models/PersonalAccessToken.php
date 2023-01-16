<?php

namespace App\Domains\Auth\Models;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;
use App\Domains\Auth\Models\Traits\Relationship\PersonalAccessTokenRelationship;
use App\Domains\Auth\Models\Traits\Scope\PersonalAccessTokenScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model; 

/**
 * Class PersonalAccessToken.
 */
class PersonalAccessToken extends SanctumPersonalAccessToken
{
    use HasFactory,
        PersonalAccessTokenScope,
        PersonalAccessTokenRelationship;

    protected $table = "personal_access_tokens"; 
    protected $primaryKey = 'id';
    
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        
        // if(!empty(request()->route()->parameter('api'))){
        //     $this->findOrFail(request()->route()->parameter('api'));
        // }
    }
}
