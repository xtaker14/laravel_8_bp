<?php

namespace App\Providers;

use App\Domains\Announcement\Services\AnnouncementService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Domains\Auth\Models\Permission as AdmCategories; 
use App\Domains\Auth\Models\PersonalAccessToken; 
use App\Models\Konfigurasi_model;
use Laravel\Sanctum\Sanctum;

/**
 * Class ComposerServiceProvider.
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @param  AnnouncementService  $announcementService
     */
    public function boot(AnnouncementService $announcementService)
    {
        View::composer('*', function ($view) {
            $personal_access_tokens = new PersonalAccessToken();
            if(\Illuminate\Support\Facades\Schema::hasTable($personal_access_tokens->getTable())){
                Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
            }
            
            $get_config_site = new Konfigurasi_model();
            $config_site = $get_config_site->listing();

            $view->with('config_site', $config_site); 
            $view->with('logged_in_user', auth()->user());
        });

        View::composer(['frontend.index', 'frontend.layouts.app'], function ($view) use ($announcementService) {
            $view->with('announcements', $announcementService->getForFrontend());
        }); 

        $all_menus = $this->allMenus();
        // dump($all_menus);
        // exit;

        View::composer(['backend.layouts.app'], function ($view) use ($announcementService, $all_menus) {
            $view->with('announcements', $announcementService->getForBackend());
            $view->with(
                'all_menus', 
                $all_menus
            );
        });
    }

    private function allMenus(){
        $categories = new AdmCategories();
        if(!\Illuminate\Support\Facades\Schema::hasTable($categories->getTable())){
            return [];
        }

        $all_menus = $categories->where([
                'is_editable' => 'yes',
                'is_menu' => 'yes',
                // 'parent_id' => null,
            ])
            ->orderBy('parent_id', 'ASC')
            ->orderBy('sort', 'ASC')
            ->get();

        $all_menus = $categories->getUnlimitedChildren($all_menus);

        return $all_menus;
    }

    // private function buildTree(object $elements, $parent_id = 0) {
    //     $branch = array();
    //     foreach ($elements as $idx => $val) {
    //         $element = $val->getAttributes();
    //         if ($element['parent_id'] == $parent_id) {
    //             $children = $this->buildTree($elements, $element['id']);
    //             $isArray = filter_var($element['isArray'], FILTER_VALIDATE_BOOLEAN);
    //             if ($isArray) {
    //                 $element['isArray'] = $children;
    //             }
    //             $branch[] = $element;
    //         }
    //     }
    //     return $branch;
    // }
}
