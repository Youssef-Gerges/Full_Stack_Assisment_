<?php

namespace Modules\Motors\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Motors\Http\Resources\DocumentResource;
use App\Services\ResponseFormatter;
use Illuminate\Support\Facades\Gate;
use Modules\Motors\Http\Requests\DocumentStoreRequest;
use Modules\Motors\Models\Document;
use Modules\Motors\Repositories\DocumentRepo;

class DocumentsController extends Controller
{
    public function __construct(private readonly DocumentRepo $repo)
    {

    }
    public function index()
    {
        Gate::authorize('view', Document::class);
        $result = $this->repo->getAll();

        if($result['success']){
            return ResponseFormatter::success(__('All documents retrieved successfully.'), DocumentResource::collection($result['documents']));
        }
        return ResponseFormatter::error(__('Something went wrong, please try again.'), $result['error']);

    }

    public function store(DocumentStoreRequest $request){
        Gate::authorize('create', Document::class);

        $result = $this->repo->create($request);
        if($result['success']){
            return ResponseFormatter::success(__('Document created successfully.'), ['document_id' => $result['document_id']]);
        }
        return ResponseFormatter::error(__('Document not created.'), [
            'error' => $result['message']
        ]);
    }

    public function show(Document $document) {
        Gate::authorize('view', Document::class);
        $result = $this->repo->show($document->id);

        if($result['success']){
            return ResponseFormatter::success(__('All documents retrieved successfully.'), new DocumentResource($result['document']));
        }
        return ResponseFormatter::error(__('Something went wrong, please try again.'), $result['error']);

    }
}
