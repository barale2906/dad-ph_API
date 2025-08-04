<?php

namespace App\Policies;

use App\Models\Correspondencia;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CorrespondenciaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Permite ver la lista solo si el usuario tiene uno de los roles administrativos.
        return in_array($user->role, ['superusuario', 'admin', 'guarda']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Correspondencia $correspondencia): bool
    {
        // Permite ver la lista solo si el usuario tiene uno de los roles administrativos.
        return in_array($user->role, ['superusuario', 'admin', 'residente','guarda']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Permite ver la lista solo si el usuario tiene uno de los roles administrativos.
        return in_array($user->role, ['superusuario', 'admin', 'guarda']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Correspondencia $correspondencia): bool
    {
        // Permite ver la lista solo si el usuario tiene uno de los roles administrativos.
        return in_array($user->role, ['superusuario', 'admin', 'residente','guarda']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Correspondencia $correspondencia): bool
    {
        // Permite ver la lista solo si el usuario tiene uno de los roles administrativos.
        return in_array($user->role, ['superusuario', 'admin']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Correspondencia $correspondencia): bool
    {
        // Permite ver la lista solo si el usuario tiene uno de los roles administrativos.
        return in_array($user->role, ['superusuario', 'admin']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Correspondencia $correspondencia): bool
    {
        // Permite ver la lista solo si el usuario tiene uno de los roles administrativos.
        return in_array($user->role, ['superusuario', 'admin']);
    }
}
