<?php

namespace App\Http\Requests\Candidate\Resume;

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
            'phone' => ['string'],
            'mobile' => ['sometimes'],
            'website' => ['string'],
            'skype' => ['sometimes'],
            'state' => ['sometimes'],
            'country' => ['sometimes'],
            'current_employer' => ['sometimes'],
            'current_job_title' => ['sometimes'],
            'current_salary' => ['sometimes'],
            'expected_salary' => ['sometimes'],
            'educational_background' => ['sometimes', 'json'],
            'experience' => ['sometimes', 'json'],
            'skill_set' => ['sometimes'],
            'resume_url' => ['sometimes'],
            'cover_letter_url' => ['sometimes']
        ];
    }
}
