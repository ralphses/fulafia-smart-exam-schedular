<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'course-title' => ['required', 'string', Rule::unique('courses', 'title')],
            'course-faculty'  => ['required', 'integer', Rule::exists('faculties', 'id')],
            'course-code'  => ['required', 'string', Rule::unique('courses', 'code')],
            'course-unit'  => ['required', 'integer'],
            'course-semester'  => ['required', Rule::in(['first', 'second'])],
            'course-level'  => ['required', 'string'],
        ];
    }
}
