<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komponen extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'namaKomponen',
        'indikatorLED',
        'simCard',
        'kondisiAlat',
        'sambunganKabel',
        'perawatanSonde',
        'testDanSettingRTC',
        'levelAirAki',
        'teganganBateraiAki',
        'peralatan_telemetri_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'indikatorLED' => 'boolean',
        'simCard' => 'boolean',
        'kondisiAlat' => 'boolean',
        'sambunganKabel' => 'boolean',
        'perawatanSonde' => 'boolean',
        'testDanSettingRTC' => 'boolean',
        'levelAirAki' => 'boolean',
    ];

    public function peralatanTelemetri()
    {
        return $this->belongsTo(PeralatanTelemetri::class);
    }

    public function pemeriksaans()
    {
        return $this->hasMany(Pemeriksaan::class);
    }
}
