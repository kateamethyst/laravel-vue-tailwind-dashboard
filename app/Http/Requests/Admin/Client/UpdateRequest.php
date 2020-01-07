<?php

namespace App\Http\Requests\Admin\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $client = $this->route('client');

        return [
            'name' => ['sometimes', 'string', Rule::unique('clients', 'name')->ignore($client), 'max:255'],
            'website' => ['sometimes'],
            'contact_number' => ['sometimes', 'string'],
            'fax' => ['sometimes', 'string'],
            'about' => ['sometimes', 'string']
        ];
    }
}
