<?php
// Setting controller
namespace App\Http\Controllers\Frontend;

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

    public function getConfigSite(){ 
        $get_config_site = new \App\Models\Konfigurasi_model();
        $config_site = $get_config_site->listing();

        return $config_site; 
    }
}
