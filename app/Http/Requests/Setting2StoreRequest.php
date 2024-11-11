<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Setting2StoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'simulasi' => ['required', 'max:255', 'string'],
            'display' => ['required', 'max:255', 'string'],
            'form_komponen_id' => ['required', 'exists:form_komponens,id'],
        ];
    }
}
