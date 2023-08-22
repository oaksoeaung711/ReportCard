<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSignRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'keyword' => 'required|regex:/^\S*$/u',
            'signimage' => 'required|image|mimes:png'
        ];
    }

    public function messages(): array
    {
        return [
            'keyword.regex' => "Keyword can't contain white space.",
            'signimage.required' => "Image is required.",
            'signimage.mimes' => 'The image field must be a file of type: png.',
        ];
    }
}
