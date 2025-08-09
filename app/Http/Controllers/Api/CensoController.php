<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CensoResource;
use App\Models\Censo;
use Illuminate\Http\Request;

class CensoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Verifica la regla 'viewAny' en censoPolicy
        $this->authorize('viewAny', Censo::class);

        return CensoResource::collection(Censo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Verifica la regla 'create' en censoPolicy
        $this->authorize('create', Censo::class);

        $property = Censo::create($request->validated());
        return new CensoResource($property);
    }

    /**
     * Display the specified resource.
     */
    public function show(Censo $censo)
    {
        // Verifica la regla 'view' en censoPolicy para esta propiedad específica
        $this->authorize('view', $censo);

        return new CensoResource($censo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Censo $censo)
    {
        // Verifica la regla 'update' en censoPolicy para esta propiedad específica
        $this->authorize('update', $censo);

        $censo->update($request->validated());
        return new CensoResource($censo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Censo $censo)
    {
        //
    }
}
