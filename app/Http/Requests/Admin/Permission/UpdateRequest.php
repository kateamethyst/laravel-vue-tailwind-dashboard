<?php

namespace App\Http\Requests\Admin\Permission;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $permission = $this->route('permission');

        return [
            'name' => ['required', 'string', Rule::unique('permissions', 'name')],
            'guard_name' => ['sometimes'],
            'role_id' => ['sometimes', 'integer', Rule::exists('roles', 'id')]
        ];
    }
}
