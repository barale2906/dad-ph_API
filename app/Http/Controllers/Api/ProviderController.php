<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Resources\ProviderResource;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Verifica la regla 'viewAny' en ProviderPolicy
        $this->authorize('viewAny', Provider::class);
        return ProviderResource::collection(Provider::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Verifica la regla 'create' en ProviderPolicy
        $this->authorize('create', Provider::class);

        $provider = Provider::create($request->validated());
        return new ProviderResource($provider);
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        // Verifica la regla 'view' en ProviderPolicy para este proveedor específica
        $this->authorize('view', $provider);

        return new ProviderResource($provider);
    }

    public function update(StoreProviderRequest $request, Provider $provider)
    {
        // Verifica la regla 'update' en ProviderPolicy para este proveedor específica
        $this->authorize('update', $provider);

        $provider->update($request->validated());
        return new ProviderResource($provider);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
