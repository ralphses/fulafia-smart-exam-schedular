<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewExamCenterRequest extends FormRequest
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
    public function rules()
    {
        return [
            'center-code' => ['required', Rule::unique('exam_centers', 'code')],
            'center-name' => ['required', Rule::unique('exam_centers', 'name')],
            'center-capacity' => ['required', 'regex:(\\d)']
        ];
    }
}
