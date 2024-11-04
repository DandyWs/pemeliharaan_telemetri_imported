<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'namaSetting',
        'nilaiSebelumKalibrasi',
        'displaySebelumKalibrasi',
        'nilaiSetelahKalibrasi',
        'displaySetelahKalibrasi',
        'peralatan_telemetri_id',
    ];

    protected $searchableFields = ['*'];

    public function peralatanTelemetri()
    {
        return $this->belongsTo(PeralatanTelemetri::class);
    }

    public function pemeriksaans()
    {
        return $this->hasMany(Pemeriksaan::class);
    }
}
