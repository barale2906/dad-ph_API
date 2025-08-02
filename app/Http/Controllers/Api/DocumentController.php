<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Resources\DocumentResource;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Verifica la regla 'viewAny' en DocumentPolicy
        $this->authorize('viewAny', Document::class);

        return DocumentResource::collection(Document::all());
    }

    public function store(StoreDocumentRequest $request)
    {
        // Verifica la regla 'create' en DocumentPolicy
        $this->authorize('create', Document::class);

        $document = Document::create($request->validated());
        return new DocumentResource($document);
    }

    public function show(Document $document)
    {
        // Verifica la regla 'view' en DocumentPolicy para este documento específica
        $this->authorize('view', $document);

        return new DocumentResource($document);
    }

    public function update(StoreDocumentRequest $request, Document $document)
    {
        // Verifica la regla 'update' en DocumentPolicy para este documento específica
        $this->authorize('update', $document);

        $document->update($request->validated());
        return new DocumentResource($document);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
