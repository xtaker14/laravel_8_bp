<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\Controller;
use App\Models\Konfigurasi_model;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // return view('backend.dashboard');

        $mysite = new Konfigurasi_model();
        $site = $mysite->listing();

        $data = [
            "title" => $site->namaweb . " - " . $site->tagline,
            "content" => "backend/dasbor/index",
        ];
        return view("backend/layout/wrapper", $data);
    }
}
