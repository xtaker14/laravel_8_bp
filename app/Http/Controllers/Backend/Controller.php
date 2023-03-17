<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $logged_in_user;

    public function __construct(){
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->logged_in_user = auth()->user();

            return $next($request);
        });
    }
}
