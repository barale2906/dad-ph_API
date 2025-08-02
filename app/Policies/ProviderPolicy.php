<?php

namespace App\Policies;

use App\Models\Provider;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProviderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Permite ver la lista solo si el usuario tiene uno de los roles administrativos.
        return in_array($user->role, ['superusuario', 'admin', 'consejo', 'contador', 'revisor_fiscal']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Provider $provider): bool
    {
        // Permite ver la propiedad si el usuario tiene uno de los roles administrativos
        if (in_array($user->role, ['admin', 'superusuario', 'consejo', 'contador', 'revisor_fiscal'])) {
            return true;
        }
        // Verifica si el id del usuario está en la colección de usuarios de la propiedad
        return $provider->users->contains($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'superusuario']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Provider $provider): bool
    {
        return in_array($user->role, ['admin', 'superusuario']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Provider $provider): bool
    {
        return in_array($user->role, ['admin', 'superusuario']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Provider $provider): bool
    {
        return in_array($user->role, ['admin', 'superusuario']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Provider $provider): bool
    {
        return in_array($user->role, ['admin', 'superusuario']);
    }
}
