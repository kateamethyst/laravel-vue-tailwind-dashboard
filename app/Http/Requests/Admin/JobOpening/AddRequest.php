<?php

namespace App\Http\Requests\Admin\JobOpening;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required',
            'description' => 'required',
            'number_of_position' => 'sometimes|required',
            'state' => 'sometimes|required',
            'country' => 'sometimes|required',
            'status' => 'required',
            'type' => 'sometimes|required',
            'experience_level' => 'sometimes|required',
            'min_salary' => 'sometimes|required',
            'max_salary' => 'sometimes|required',
            'job_zoho_id' => 'sometimes|required',
            'client_id' => 'required'
        ];
    }
}
