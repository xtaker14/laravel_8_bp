<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_model extends Model
{
    // kategori
    public function login($username, $password)
    {
        $query = DB::table("users")
            ->select("*")
            ->where([
                "users.username" => $username,
                "users.password" => sha1($password),
            ])
            ->orderBy("id", "DESC")
            ->first();
        return $query;
    }
}
