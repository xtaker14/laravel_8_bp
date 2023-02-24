<?php

namespace App\Domains\Auth\Services;

use App\Domains\Auth\Events\Categories\CategoriesCreated;
use App\Domains\Auth\Events\Categories\CategoriesDeleted;
use App\Domains\Auth\Events\Categories\CategoriesUpdated;
use App\Domains\Auth\Models\Permission as AdmCategories;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PermissionService.
 */
class PermissionService extends BaseService
{
    /**
     * PermissionService constructor.
     *
     * @param  AdmCategories  $categories
     */
    public function __construct(AdmCategories $categories)
    {
        $this->model = $categories;
    }

    /**
     * @param  array  $data
     * @return AdmCategories
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): AdmCategories
    {
        DB::beginTransaction();

        $exp_controller_method = [];
        $controller_name = null;
        $method_name = null;
        if($data['is_parent_menu'] == 'no'){
            if($data['is_module'] == 'yes'){
                $exp_controller_method = explode('@', $data['m_controller_name']);
            }else if($data['is_module'] == 'no'){
                $exp_controller_method = explode('@', $data['non_m_controller_name']);
            }

            if(empty($exp_controller_method) || count($exp_controller_method) == 1){
                DB::rollBack(); 
                throw new GeneralException(__('There was a problem creating the categories. (Controller not found)'));
            }
            $controller_name = $exp_controller_method[0];
            $method_name = $exp_controller_method[1];
        }

        try {
            $data_insert = [
                'type' => $data['type'], 
                'name' => $data['name'],
                'description' => $data['description'],
                'parent_id' => $data['parent_id'],
                'sort' => $data['sort'],
                'is_active' => $data['is_active'],
                'is_editable' => 'yes',
                'is_menu' => $data['is_menu'],
                'is_module' => $data['is_module'],
                'module_name' => $data['module_name'],
                'controller_name' => $controller_name,
                'method_name' => $method_name,
                'menu_url' => $data['menu_url'],
                'menu_route' => $data['menu_route'],
            ];

            if($data['is_parent_menu'] == 'yes'){
                $data_insert['is_module'] = 'no';
                $data_insert['module_name'] = null;
            }

            $categories = $this->model::create($data_insert);
        } catch (Exception $e) {
            DB::rollBack(); 

            throw new GeneralException(__('There was a problem creating the categories. (' . $e->getMessage() . ')'));
        }

        event(new CategoriesCreated($categories));

        DB::commit();

        return $categories;
    }

    /**
     * @param  AdmCategories  $categories
     * @param  array  $data
     * @return AdmCategories
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(AdmCategories $categories, array $data = []): AdmCategories
    {
        DB::beginTransaction();

        $exp_controller_method = [];
        $controller_name = null;
        $method_name = null;
        if($data['is_parent_menu'] == 'no'){
            if($data['is_module'] == 'yes'){
                $exp_controller_method = explode('@', $data['m_controller_name']);
            }else if($data['is_module'] == 'no'){
                $exp_controller_method = explode('@', $data['non_m_controller_name']);
            }

            if(empty($exp_controller_method) || count($exp_controller_method) == 1){
                DB::rollBack(); 
                throw new GeneralException(__('There was a problem creating the categories. (Controller not found)'));
            }
            $controller_name = $exp_controller_method[0];
            $method_name = $exp_controller_method[1];
        }

        try {
            $data_update = [
                'type' => $data['type'], 
                'name' => $data['name'],
                'description' => $data['description'],
                'parent_id' => $data['parent_id'],
                'sort' => $data['sort'],
                'is_active' => $data['is_active'],
                'is_editable' => 'yes',
                'is_menu' => $data['is_menu'],
                'is_module' => $data['is_module'],
                'module_name' => $data['module_name'],
                'controller_name' => $controller_name,
                'method_name' => $method_name,
                'menu_url' => $data['menu_url'],
                'menu_route' => $data['menu_route'],
            ];

            if($data['is_parent_menu'] == 'yes'){
                $data_update['is_module'] = 'no';
                $data_update['module_name'] = null;
            }
            
            $categories->update($data_update);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the categories. (' . $e->getMessage() . ')'));
        }

        event(new CategoriesUpdated($categories));

        DB::commit();

        return $categories;
    }

    /**
     * @param  AdmCategories  $categories
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(AdmCategories $categories): bool
    {
        if ($categories->users()->count()) {
            throw new GeneralException(__('You can not delete a categories with associated users.'));
        }

        // dd($categories->getAttributes());
        // $this->getAllChildren($categories);
        // exit;

        if ($this->deleteById($categories->id)) {
            event(new CategoriesDeleted($categories));

            return true;
        }

        throw new GeneralException(__('There was a problem deleting the categories.'));
    }

    private function getAllChildren($data, $str='parent')
    {
        if($data->getAttributes()){
            dump([$str, $data->description]);
            
            foreach($data->children()->get() as $idx => $val){
                dump([$str, $val->description]);
                if(!empty($val->children)){
                    $this->getAllChildren($val, 'child');
                }
            }
        }else{
            foreach($data as $idx => $val){
                dump([$str, $val->description]);
                if(!empty($val->children)){
                    $this->getAllChildren($val->children()->get(), 'child');
                }
            }
        }
    }

    /**
     * @return mixed
     */
    public function getCategorizedPermissions()
    {
        return $this->model::isMaster()
            ->with('children')
            ->get();
    }

    /**
     * @return mixed
     */
    public function getUncategorizedPermissions()
    {
        return $this->model::singular()
            ->orderBy('sort', 'asc')
            ->get();
    }
}
