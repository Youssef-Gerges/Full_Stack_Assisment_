<?php

namespace Modules\General\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Modules\General\Services\EncryptionService;

class DocumentHeader extends Model
{
    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
