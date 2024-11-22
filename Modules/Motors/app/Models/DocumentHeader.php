<?php

namespace Modules\Motors\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Modules\Motors\Services\EncryptionService;

class DocumentHeader extends Model
{
    protected $table = 'motors_document_headers';

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
