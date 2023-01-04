<?php

namespace Modules\Pegawai\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = "pegawai";

    protected $fillable = ["name","email","address","no_phone","updated_date"];
    
    protected static function newFactory()
    {
        return \Modules\Pegawai\Database\factories\PegawaiFactory::new();
    }
}
