<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PeralatanTelemetri extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'namaAlat',
        'serialNumber',
        'lokasiStasiun',
        'jenis_peralatan_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'peralatan_telemetris';

    public function jenisPeralatan()
    {
        return $this->belongsTo(JenisPeralatan::class);
    }

    public function komponens()
    {
        return $this->hasMany(Komponen::class);
    }

    public function pemeliharaans()
    {
        return $this->hasMany(Pemeliharaan::class);
    }

    public function settings()
    {
        return $this->hasMany(Setting::class);
    }
}
