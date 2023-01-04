<?php

use Carbon\Carbon;

if (! function_exists('appName')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function appName()
    {
        return config('app.name', 'Laravel Boilerplate');
    }
}

if (! function_exists('carbon')) {
    /**
     * Create a new Carbon instance from a time.
     *
     * @param $time
     * @return Carbon
     *
     * @throws Exception
     */
    function carbon($time)
    {
        return new Carbon($time);
    }
}

if (! function_exists('homeRoute')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function homeRoute()
    {
        if (auth()->check()) {
            if (auth()->user()->isAdmin()) {
                return 'admin.dashboard';
            }

            if (auth()->user()->isUser()) {
                return 'frontend.user.dashboard';
            }
        }

        return 'frontend.index';
    }
}

if (! function_exists('getAttrNonOrModule')) {
    function getAttrNonOrModule($get_res = false)
    {
        // $modules_statuses = json_decode(file_get_contents(base_path('modules_statuses.json')), true);

        $non_modules = [];
        $modules = [];
        // $test = [];
        foreach (\Illuminate\Support\Facades\Route::getRoutes()->getRoutes() as $c_route)
        {
            $c_action = $c_route->getAction();
            if (array_key_exists('controller', $c_action))
            {
                $controller_path = explode('@', $c_action['controller'])[0];
                if(!isset(explode('@', $c_action['controller'])[1])){
                    continue;
                }
                $method_name = explode('@', $c_action['controller'])[1];

                if(str_contains($controller_path, 'App\Http\Controllers\\'))
                {
                    $exp_controller_path = explode('\\', $controller_path);
                    $last_controller_path = end($exp_controller_path);
                    $controller_name = str_replace('Controller', '', $last_controller_path);
                    $controller_name = ucwords(trim(implode(' ',preg_split('/(?=[A-Z])/', $controller_name))));

                    if(count($exp_controller_path)>4){
                        // controller from backend / frontend
                        $controller_name = $exp_controller_path[3].'_'.$controller_name;
                    }
                    
                    $non_modules[$controller_name][] = [
                        'path'=>$controller_path,
                        'as'=>$c_action['as'],
                        'prefix'=>$c_action['prefix'],
                        'methods'=>$c_route->methods(),
                        'uri'=>$c_route->uri(),
                        'controller_name'=>str_replace('_', ' - ', $controller_name),
                        'method_name'=>$method_name,
                    ];
                }
                else {
                    $controller_path_2 = explode('\\', $controller_path);
                    $is_module = array(
                        'Modules', 'Http', 'Controllers'
                    );

                    if(count(array_intersect($controller_path_2, $is_module)) == count($is_module)){ 
                        $module_name = $controller_path_2[1];
                        // $modules_stat = 'deactive';
                        // if($modules_statuses[$module_name]){
                        //     $modules_stat = 'active';
                        // }
                        $exp_controller_path = explode('\\', $controller_path);
                        $last_controller_path = end($exp_controller_path);
                        $controller_name = str_replace('Controller', '', $last_controller_path);
                        $controller_name = ucwords(trim(implode(' ',preg_split('/(?=[A-Z])/', $controller_name))));
                        $modules[$module_name][] = [
                            'path'=>$controller_path,
                            'as'=>$c_action['as'],
                            'prefix'=>$c_action['prefix'],
                            'methods'=>$c_route->methods(),
                            'uri'=>$c_route->uri(),
                            // 'modules_stat'=>$modules_stat,
                            'module_name'=>$module_name,
                            'controller_name'=>$controller_name,
                            'method_name'=>$method_name,
                        ];
                    }
                }
            }
        }
        // dd($modules_statuses, $modules, $non_modules);

        if($get_res == 'module'){
            return $modules;
        }
        if($get_res == 'non_module'){
            return $non_modules;
        }

        return [
            'modules' => $modules, 
            'non_modules' => $non_modules
        ];
    }
}

// if (! function_exists('adminDynamicMenus')) { 
//     function adminDynamicMenus($all_menus)
//     { 
//         $res = '';
//         foreach ($all_menus as $menu) {
//             $res .= '
//                 <li>'.$menu->description.'</li>
//             ';
//             if(!empty($menu->children)){
//                 $res .= '<ul>';
//                 $res .= adminDynamicMenus($menu->children);
//                 $res .= '</ul>';
//             }
//         }

//         return $res;
//     }
// }
