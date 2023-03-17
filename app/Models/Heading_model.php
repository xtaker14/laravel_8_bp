<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
// use App\Domains\Auth\Models\User; 

class Heading_model extends Model
{
    use HasFactory;
    
    protected $table = "heading";
    protected $primaryKey = "id_heading"; 
}
