<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingStoreRequest extends FormRequest
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
            // 'namaSetting' => ['required', 'max:255', 'string'],
            // 'nilaiSebelumKalibrasi' => ['required', 'numeric'],
            // 'displaySebelumKalibrasi' => ['required', 'numeric'],
            // 'nilaiSetelahKalibrasi' => ['required', 'numeric'],
            // 'displaySetelahKalibrasi' => ['required', 'numeric'],
            // 'peralatan_telemetri_id' => [
            //     'required',
            //     'exists:peralatan_telemetris,id',
            'simulasi' => ['required', 'max:255', 'string'],
            'display' => ['required', 'max:255', 'string'],
            'form_komponen_id' => ['required', 'exists:form_komponens,id'],
        ];
    }
}
