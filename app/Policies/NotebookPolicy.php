<?php

namespace App\Policies;

use App\Models\Notebook;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotebookPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Notebook $notebook)
    {
        return $notebook->user_id == $user->id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Notebook $notebook)
    {
        return $this->view($user, $notebook);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Notebook $notebook)
    {
        return $this->view($user, $notebook);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Notebook $notebook)
    {
        return $this->view($user, $notebook);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Notebook $notebook)
    {
        return $this->view($user, $notebook);
    }
}
