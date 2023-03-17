<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subscribers_email_model extends Model
{
    protected $table = "subscribers_email";
    protected $primaryKey = "id";
    
    public $timestamps = false;

    public function userCreated()
    {
        return $this->hasOne(User::class, 'id', 'created_by')->withDefault([
            'name' => '-NoName-',
        ]);
    }
}
