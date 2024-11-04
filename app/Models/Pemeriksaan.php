<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemeriksaan extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'hasilPemeriksaan',
        'catatan',
        'pemeliharaan_id',
        'user_id',
        'komponen_id',
        'setting_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'hasilPemeriksaan' => 'boolean',
    ];

    public function pemeliharaan()
    {
        return $this->belongsTo(Pemeliharaan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function komponen()
    {
        return $this->belongsTo(Komponen::class);
    }

    public function setting()
    {
        return $this->belongsTo(Setting::class);
    }
}
