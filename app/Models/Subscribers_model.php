<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subscribers_model extends Model
{
    protected $table = "subscribers";
    protected $primaryKey = "id";
    
    public $timestamps = false;

    public function userCreated()
    {
        return $this->hasOne(User::class, 'id', 'created_by')->withDefault([
            'name' => '-NoName-',
        ]);
    }
    public function userUpdated()
    {
        return $this->hasOne(User::class, 'id', 'updated_by')->withDefault([
            'name' => '-NoName-',
        ]);
    }
}
