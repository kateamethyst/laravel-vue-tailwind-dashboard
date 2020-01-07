<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
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
        $user = $this->route('user');

        return [
            'first_name' => ['sometimes', 'required', 'max:255', 'string'],
            'last_name' => ['sometimes', 'required', 'max:255', 'string'],
            'email' => ['sometimes', 'required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user)],
            'password' => ['sometimes', 'required', 'string', 'min:7'],
            'type' => [
                Rule::in([
                    User::TYPE_ADMIN,
                    User::TYPE_CANDIDATE,
                    User::TYPE_CLIENT,
                    User::TYPE_SUPERADMIN,
                ]),
                'sometimes'
            ]
        ];
    }
}
