<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaryStoreRequest extends FormRequest
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
                'national_id' => 'required|string',
                'companyCommercialRegister' => 'required|string',
                'isTaxCompliant' => 'required|boolean',
                'isRecordedAddedValue' => 'required|boolean',
                'terrorismFunding' => 'required|mimes:jpg,jpeg,png,pdf',
                'paymentFunding' => 'required|mimes:jpg,jpeg,png,pdf',
                'status' => 'required|boolean'
            ];
        } else {
            return [
                'national_id' => 'id is required',
                'companyCommercialRegister' => 'Company commercial register is required',
                'isRecordedAddedValue' => 'Recorded added value is required',
                'isTaxCompliant' => 'Tax Compliance is required',
                'terrorismFunding' => 'Terrosim funding list is required',
                'paymentFunding' => 'Payment funding list is required',
                'status' => 'Status is required'
            ];
        }
        // return [];
    }
    public function messages(): array
    {
        if (request()->isMethod('post')) {
            return [
                'national_id' => 'id is required',
                'companyCommercialRegister' => 'Company commercial register is required',
                'isRecordedAddedValue' => 'Recorded added value is required',
                'isTaxCompliant' => 'Tax Compliance is required',
                'terrorismFunding' => 'Terrosim funding list is required',
                'paymentFunding' => 'Payment funding list is required',
                'status' => 'Status is required'
            ];
        } else {
            return [
                'national_id' => 'id is required',
                'companyCommercialRegister' => 'Company commercial register is required',
                'isRecordedAddedValue' => 'Recorded added value is required',
                'isTaxCompliant' => 'Tax Compliance is required',
                'terrorismFunding' => 'Terrosim funding list is required',
                'paymentFunding' => 'Payment funding list is required',
                'status' => 'Status is required'
            ];
        }
        // return [];
    }
}
