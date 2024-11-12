<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Creagia\LaravelSignPad\Concerns\RequiresSignature;
use Creagia\LaravelSignPad\Contracts\CanBeSigned;
use Creagia\LaravelSignPad\Contracts\ShouldGenerateSignatureDocument;
use Creagia\LaravelSignPad\Templates\BladeDocumentTemplate;
use Creagia\LaravelSignPad\Templates\PdfDocumentTemplate;
use Creagia\LaravelSignPad\SignatureDocumentTemplate;
use Creagia\LaravelSignPad\SignaturePosition;

class Pemeliharaan2 extends Model implements CanBeSigned, ShouldGenerateSignatureDocument
{
    use HasFactory;
    use Searchable;
    use RequiresSignature;

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
    public function getSignatureDocumentTemplate(): SignatureDocumentTemplate
    {
        return new SignatureDocumentTemplate(
            outputPdfPrefix: 'document', // optional
            // template: new BladeDocumentTemplate('pdf/my-pdf-blade-template'), // Uncomment for Blade template
            template: new PdfDocumentTemplate(storage_path('pdf/template.pdf')), // Uncomment for PDF template
            signaturePositions: [
                 new SignaturePosition(
                     signaturePage: 1,
                     signatureX: 20,
                     signatureY: 25,
                 ),
                 new SignaturePosition(
                     signaturePage: 2,
                     signatureX: 25,
                     signatureY: 50,
                 ),
            ]               
        );
    }
}
