<?php

namespace App\Http\Requests;

use App\Utilities\Utility;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewStudentRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'student-name' => ['required', 'regex:(\\w)'],
            'student-email' => ['required', 'email', Rule::unique('students', 'email')],
            'student-school' => ['required', Rule::exists('schools', 'id')],
            'student-level' => ['required', Rule::in(Utility::LEVELS)],
            'student-fees' => ['required', Rule::unique('students', 'fees')],
            'student-matric' => ['required', 'string', Rule::unique('students', 'matric')],

        ];
    }
}
