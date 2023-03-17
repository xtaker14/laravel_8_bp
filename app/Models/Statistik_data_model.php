<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use App\Domains\Auth\Models\User; 

class Statistik_data_model extends Model
{
    use HasFactory;
    
    protected $table = "statistik_data";
    protected $primaryKey = "id";
    // protected $attributes = [
    //     'updated_date' => '-',
    // ];
    // const CREATED_AT = 'name_of_created_at_column';
    // const UPDATED_AT = 'name_of_updated_at_column';

    // const UPDATED_AT = null;
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
