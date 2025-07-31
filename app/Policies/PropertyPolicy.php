<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PropertyPolicy
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
    // Un usuario puede ver una propiedad si es admin o si está asociado a ella
    public function view(User $user, Property $property): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        // Verifica si el id del usuario está en la colección de usuarios de la propiedad
        return $property->users->contains($user);
    }
    /**
     * Determine whether the user can create models.
     */
    // Solo los administradores pueden crear propiedades
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'superusuario']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Property $property): bool
    {
        // Permite la acción si el rol del usuario es 'admin' O 'council'.
        return in_array($user->role, ['admin', 'superusuario']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Property $property): bool
    {
        // Permite la acción si el rol del usuario es 'admin' O 'council'.
        return in_array($user->role, ['admin', 'superusuario']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Property $property): bool
    {
        // Permite la acción si el rol del usuario es 'admin' O 'council'.
        return in_array($user->role, ['admin', 'superusuario']);
    }

    /**
     * Determine whether the user can permanently delete the model.

    public function forceDelete(User $user, Property $property): bool
    {

    } */
}
