<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemeliharaan2 extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'tanggal',
        'waktu',
        'periode',
        'cuaca',
        'no_alatUkur',
        'no_GSM',
        'alat_telemetri_id',
        'user_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'tanggal' => 'datetime',
    ];

    public function alatTelemetri()
    {
        return $this->belongsTo(AlatTelemetri::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formKomponens()
    {
        return $this->hasMany(FormKomponen::class);
    }
}
