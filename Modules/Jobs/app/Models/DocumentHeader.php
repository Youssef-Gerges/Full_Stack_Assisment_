<?php

namespace Modules\Jobs\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Modules\Jobs\Services\EncryptionService;

class DocumentHeader extends Model
{
    protected $table = 'jobs_document_headers';

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
