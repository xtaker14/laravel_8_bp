<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Konfigurasi_model;
use Image;

class Dasbor extends Controller
{
    // Index
    public function index()
    { 
        $mysite = new Konfigurasi_model();
        $site = $mysite->listing();

        $data = [
            "title" => $site->namaweb . " - " . $site->tagline,
            "content" => "backend/dasbor/index",
        ];
        return view("backend/layout/wrapper", $data);
    }
}
