<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemeliharaanStoreRequest extends FormRequest
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
            'tanggalPemeliharan' => ['required', 'date'],
            'waktuMulaiPemeliharan' => ['required', 'date'],
            'periodePemeliharaan' => ['required', 'max:255', 'string'],
            'cuaca' => ['required', 'max:255', 'string'],
            'no_AlatUkur' => ['required', 'max:255'],
            'no_GSM' => ['required', 'max:255'],
            'user_id' => ['required', 'exists:users,id'],
            'peralatan_telemetri_id' => [
                'required',
                'exists:peralatan_telemetris,id',
            ],
        ];
    }
}
