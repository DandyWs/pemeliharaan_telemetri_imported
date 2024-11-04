<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisPeralatan extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['namaJenisAlat'];

    protected $searchableFields = ['*'];

    protected $table = 'jenis_peralatans';

    public function peralatanTelemetris()
    {
        return $this->hasMany(PeralatanTelemetri::class);
    }
}
