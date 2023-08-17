<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
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
        if (request()->isMethod('post')) {
            return [
                'name' => 'required|string|max:258',
                'description' => 'required|string',
                'status' => 'required|boolean'
            ];
        } else {
            return [
                'name' => 'required|string|max:258',
                'description' => 'required|string',
                'status' => 'required|boolean'
            ];
        }
    }
    public function messages(): array
    {
        if (request()->isMethod('post')) {
            return [
                'name.required' => 'name is required',
                'description.required' => 'description is required',
                'status.required' => 'status is required'
            ];
        } else {
            return [
                'name.required' => 'name is required',
                'description.required' => 'description is required',
                'status.required' => 'status is required'
            ];
        }
    }
}
