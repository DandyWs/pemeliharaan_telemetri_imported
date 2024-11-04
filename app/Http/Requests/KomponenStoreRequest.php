<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KomponenStoreRequest extends FormRequest
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
            'namaKomponen' => ['required', 'max:255', 'string'],
            'indikatorLED' => ['nullable', 'boolean'],
            'simCard' => ['nullable', 'boolean'],
            'kondisiAlat' => ['nullable', 'boolean'],
            'sambunganKabel' => ['nullable', 'boolean'],
            'perawatanSonde' => ['nullable', 'boolean'],
            'testDanSettingRTC' => ['nullable', 'boolean'],
            'levelAirAki' => ['nullable', 'boolean'],
            'teganganBateraiAki' => ['nullable', 'max:255'],
            'peralatan_telemetri_id' => [
                'required',
                'exists:peralatan_telemetris,id',
            ],
        ];
    }
}
