<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeralatanTelemetriStoreRequest extends FormRequest
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
            'namaAlat' => ['required', 'max:255', 'string'],
            'serialNumber' => ['required', 'max:255', 'string'],
            'lokasiStasiun' => ['required', 'max:255', 'string'],
            'jenis_peralatan_id' => ['required', 'exists:jenis_peralatans,id'],
        ];
    }
}
