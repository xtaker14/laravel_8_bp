<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Categories;

use App\Domains\Auth\Http\Requests\Backend\Categories\StoreCategoriesRequest;
use App\Domains\Auth\Http\Requests\Backend\Categories\DeleteCategoriesRequest;
use App\Domains\Auth\Http\Requests\Backend\Categories\EditCategoriesRequest;
use App\Domains\Auth\Http\Requests\Backend\Categories\UpdateCategoriesRequest;
use App\Domains\Auth\Models\Permission as AdmCategories; 
use App\Domains\Auth\Services\PermissionService;
use Illuminate\Support\Facades\Route;

/**
 * Class CategoriesController.
 */
class CategoriesController
{ 
    /**
     * @var PermissionService
     */
    protected $permissionService;
    
    /**
     * CategoriesController constructor.
     *
     * @param  PermissionService  $permissionService
     */
    public function __construct(PermissionService $permissionService)
    { 
        return redirect()->route('admin.dashboard')->send();

        $this->permissionService = $permissionService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.auth.categories.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        $parent_categories = AdmCategories::where('is_editable', 'yes')->get(); 
        // $modules_statuses = json_decode(file_get_contents(base_path('modules_statuses.json')), true);

        $get_attr_module = getAttrNonOrModule();
        $non_modules = $get_attr_module['non_modules'];
        $modules = $get_attr_module['modules']; 
        // dd($modules, $non_modules);

        return view('backend.auth.categories.create', [
            'parent_categories' => $parent_categories,
            'modules' => $modules,
            'non_modules' => $non_modules,
        ]);
    }

    /**
     * @param  StoreCategoriesRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreCategoriesRequest $request)
    {
        $this->permissionService->store($request->validated());

        return redirect()->route('admin.auth.categories.index')->withFlashSuccess(__('The categories was successfully created.'));
    }

    /**
     * @param  EditCategoriesRequest  $request
     * @param  AdmCategories  $categories
     * @return mixed
     */
    public function edit(EditCategoriesRequest $request, AdmCategories $categories)
    {
        $parent_categories = AdmCategories::where('is_editable', 'yes')->get(); 

        $get_attr_module = getAttrNonOrModule();
        $non_modules = $get_attr_module['non_modules'];
        $modules = $get_attr_module['modules']; 
        // dd($modules, $non_modules);
        
        return view('backend.auth.categories.edit', [
            'parent_categories' => $parent_categories,
            'modules' => $modules,
            'non_modules' => $non_modules,
        ])->withCategory($categories);
    }

    /**
     * @param  UpdateCategoriesRequest  $request
     * @param  AdmCategories  $categories
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateCategoriesRequest $request, AdmCategories $categories)
    {
        $this->permissionService->update($categories, $request->validated());

        return redirect()->route('admin.auth.categories.index')->withFlashSuccess(__('The categories was successfully updated.'));
    }

    /**
     * @param  DeleteCategoriesRequest  $request
     * @param  AdmCategories  $categories
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(DeleteCategoriesRequest $request, AdmCategories $categories)
    {
        $this->permissionService->destroy($categories);

        return redirect()->route('admin.auth.categories.index')->withFlashSuccess(__('The categories was successfully deleted.'));
    }
}
