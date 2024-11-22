<?php

namespace Modules\Jobs\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Modules\Jobs\Services\EncryptionService;

class DocumentBody extends Model
{
    protected $table = 'jobs_document_bodies';

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
