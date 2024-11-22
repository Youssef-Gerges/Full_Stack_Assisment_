<?php

namespace Modules\General\Repositories;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Modules\General\Models\Document;
use Modules\General\Models\DocumentBody;
use Modules\General\Models\DocumentHeader;
use Modules\General\Services\EncryptionService;

class DocumentRepo
{
    public function getAll()
    {
        $documents = Document::with('document_header', 'document_body')->get();
        try {
            return [
                'success' => true,
                'documents' => $documents,
            ];
        } catch (\Throwable $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }

    }


    public function show($id)
    {

        try {

            $document = Document::findOrFail($id);
            return [
                'success' => true,
                'document' => $document,
            ];
        } catch (\Throwable $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];

        }

    }


    public function create($data)
    {
        try {
            DB::beginTransaction();
            $header_key = EncryptionService::encryptKey();
            $body_key = EncryptionService::encryptKey();
            $document = new Document();
            $document->header = EncryptionService::encrypt_file($data['header'], $header_key);
            $document->body = EncryptionService::encrypt_file($data['body'], $body_key);
            $document->save();

            $header = new DocumentHeader();
            $header->document_id = $document->id;
            $header->encrypted_header = base64_encode(Crypt::encrypt($header_key));
            $header->title = $data['meta_title'];
            $header->save();


            $body = new DocumentBody();
            $body->document_id = $document->id;
            $body->encrypted_body = base64_encode(Crypt::encrypt($body_key));
            $body->save();
            DB::commit();

            return [
                'success' => true,
                'document_id' => $document->id,
            ];
        } catch (\Throwable $exception) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }

    }

}
