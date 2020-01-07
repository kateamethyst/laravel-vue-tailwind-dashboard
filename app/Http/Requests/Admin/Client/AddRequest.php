<?php

namespace App\Http\Requests\Admin\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', Rule::unique('clients', 'name'), 'max:255'],
            'website' => ['required'],
            'contact_number' => ['required', 'string', 'max:255'],
            'fax' => ['required', 'string', 'max:255'],
            'about' => ['required', 'string'],
        ];
    }
}
