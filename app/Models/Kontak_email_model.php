<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kontak_email_model extends Model
{
    protected $table = "kontak_email";
    protected $primaryKey = "id";

    public $timestamps = false;
}