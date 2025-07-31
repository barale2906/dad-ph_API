<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        // Verifica la regla 'viewAny' en PropertyPolicy
        $this->authorize('viewAny', Property::class);

        return PropertyResource::collection(Property::all());
    }

    public function store(StorePropertyRequest $request)
    {
        // Verifica la regla 'create' en PropertyPolicy
        $this->authorize('create', Property::class);

        $property = Property::create($request->validated());
        return new PropertyResource($property);
    }

    public function show(Property $property)
    {
        // Verifica la regla 'view' en PropertyPolicy para esta propiedad específica
        $this->authorize('view', $property);

        return new PropertyResource($property);
    }

    public function update(StorePropertyRequest $request, Property $property)
    {
        // Verifica la regla 'update' en PropertyPolicy para esta propiedad específica
        $this->authorize('update', $property);

        $property->update($request->validated());
        return new PropertyResource($property);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
