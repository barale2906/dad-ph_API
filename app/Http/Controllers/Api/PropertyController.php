<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Aplicaremos políticas de seguridad aquí más adelante
        return PropertyResource::collection(Property::all());
    }

    public function store(StorePropertyRequest $request)
    {
        // El request ya ha sido validado por StorePropertyRequest
        $property = Property::create($request->validated());
        return new PropertyResource($property);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
