<?php

namespace Modules\General\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\General\Services\EncryptionService;

class DocumentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'meta_title' => $this->document_header->title,
            'file' => EncryptionService::getDocumentFile(header_path: $this->header, header_key: base64_decode($this->document_header->encrypted_header), body_path: $this->body, body_key: base64_decode($this->document_body->encrypted_body))
        ];
    }
}
