<?php

namespace App\Http\Requests\Admin\Role;

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
        $role = $this->route('role');

        return [
            'name' => ['required', 'string', Rule::unique('roles', 'name')->ignore($role)],
            'guard_name' => ['sometimes']
        ];
    }
}
