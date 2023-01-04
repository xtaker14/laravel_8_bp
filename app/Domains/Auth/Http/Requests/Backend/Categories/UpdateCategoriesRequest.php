<?php

namespace App\Domains\Auth\Http\Requests\Backend\Categories;

use App\Domains\Auth\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UpdateCategoriesRequest.
 */
class UpdateCategoriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ($this->user()->hasAllAccess() && $this->categories->is_editable === 'yes');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // input field name
        $is_menu = $this->input('is_menu');
        $is_parent_menu = $this->input('is_parent_menu');
        $is_module = $this->input('is_module');

        $res = [
            'type' => ['required', Rule::in([User::TYPE_ADMIN, User::TYPE_USER])],
            'description' => ['required'], // category name
            'is_active' => ['required', Rule::in(['yes', 'no'])],
            'is_menu' => ['required', Rule::in(['yes', 'no'])],
            'is_module' => ['required', Rule::in(['yes', 'no'])],
            'is_parent_menu' => ['nullable'],
            'module_name' => ['nullable'],
            'm_controller_name' => ['nullable'],
            'non_m_controller_name' => ['nullable'],
            'menu_url' => ['nullable'],
            'menu_route' => ['nullable'],
            'name' => ['required', 'max:100', Rule::unique('permissions')->ignore($this->categories)],
            'parent_id' => ['nullable', Rule::exists('permissions', 'id')],
            'sort' => ['required','integer'],
        ];

        if($is_menu == 'yes'){
            $res['is_parent_menu'] = [
                'required',
            ];
            $res['menu_url'] = [
                'required',
            ];
            $res['menu_route'] = [
                'required',
            ];
        }

        if($is_parent_menu == 'yes'){
            $res['module_name'] = [
                'nullable',
            ];
            $res['m_controller_name'] = [
                'nullable', 
            ];
            $res['non_m_controller_name'] = [
                'nullable', 
            ];
        }else{
            if($is_module == 'yes'){
                $res['module_name'] = [
                    'required',
                ];
                $res['m_controller_name'] = [
                    'required', 
                    'max:100',
                ];
            }else if($is_module == 'no'){
                $res['non_m_controller_name'] = [
                    'required', 
                    'max:100',
                ];
            }
        }

        return $res;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.unique' => __('The Access Name has already been taken.'),
            // 'permissions.*.exists' => __('One or more permissions were not found or are not allowed to be associated with this role type.'),
        ];
    }

    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    protected function failedAuthorization()
    {
        throw new AuthorizationException(__('You can not edit the Administrator Categories.'));
    }
}
