<?php

namespace Modules\Motors\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Document extends Model
{
    protected $table = 'motors_documents';

    public function document_header(): HasOne
    {
        return $this->hasOne(DocumentHeader::class, 'document_id', 'id');
    }

    public function document_body(): HasOne
    {
        return $this->hasOne(DocumentBody::class, 'document_id', 'id');
    }

}
