<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewCourseRequest extends FormRequest
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
            'course-department'  => ['required', 'integer', Rule::exists('departments', 'id')],
            'course-code'  => ['required', 'string', Rule::unique('courses', 'code')],
            'course-unit'  => ['required', 'integer'],
            'course-semester'  => ['required', Rule::in(['first', 'second'])],
            'course-general'  => ['required', Rule::in(['0', '1'])],
            'course-level'  => ['required', 'string'],
        ];
    }
}
