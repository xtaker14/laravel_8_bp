<?php

namespace App\Domains\Auth\Http\Requests\Backend\AuthApi;

use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreRequest.
 */
class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasAllAccess();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // input field name
        $input_abilities = $this->input('abilities'); 
        $input_user = $this->input('user'); 

        $res = [
            // 'tokenable_type' => ['required'], 
            'user' => ['required'], // tokenable_id
            'name' => ['required', 'max:50'],
            // 'token' => ['required'],
            'abilities' => ['required'], 
        ]; 

        return $res;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [ 
            // 'permissions.*.exists' => __('One or more permissions were not found or are not allowed to be associated with this role type.'),
        ];
    }
}
