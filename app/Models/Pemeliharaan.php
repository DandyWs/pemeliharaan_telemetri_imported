<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemeliharaan extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'tanggalPemeliharan',
        'waktuMulaiPemeliharan',
        'periodePemeliharaan',
        'cuaca',
        'no_AlatUkur',
        'no_GSM',
        'user_id',
        'peralatan_telemetri_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'tanggalPemeliharan' => 'datetime',
        'waktuMulaiPemeliharan' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function peralatanTelemetri()
    {
        return $this->belongsTo(PeralatanTelemetri::class);
    }

    public function pemeriksaans()
    {
        return $this->hasMany(Pemeriksaan::class);
    }
}
