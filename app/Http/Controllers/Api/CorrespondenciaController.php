<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CorrespondenciaResource;
use App\Models\Correspondencia;
use Illuminate\Http\Request;

class CorrespondenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Verifica la regla 'viewAny' en CorrespondenciaPolicy
        $this->authorize('viewAny', Correspondencia::class);

        return CorrespondenciaResource::collection(Correspondencia::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Verifica la regla 'create' en CorrespondenciaPolicy
        $this->authorize('create', Correspondencia::class);

        $correspondencia = Correspondencia::create($request->validated());
        return new CorrespondenciaResource($correspondencia);
    }

    /**
     * Display the specified resource.
     */
    public function show(Correspondencia $correspondencia)
    {
        // Verifica la regla 'view' en CorrespondenciaPolicy para este documento específica
        $this->authorize('view', $correspondencia);

        return new CorrespondenciaResource($correspondencia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Correspondencia $correspondencia)
    {
        // Verifica la regla 'update' en CorrespondenciaPolicy para este documento específica
        $this->authorize('update', $correspondencia);

        $correspondencia->update($request->validated());
        return new CorrespondenciaResource($correspondencia);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Correspondencia $correspondencia)
    {
        //
    }
}
