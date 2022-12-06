<?php

namespace App\Policies;

use App\Models\Notebook;
use App\Models\NotebookPage;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotebookPagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\NotebookPage  $page
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, NotebookPage $page)
    {
        return $page->notebook->user_id == $user->id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\NotebookPage  $page
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, NotebookPage $page)
    {
        return $this->view($user, $page);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, NotebookPage $page)
    {
        return $this->view($user, $page);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Notebookpage $page)
    {
        return $this->view($user, $page);
    }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @param  \App\Models\Notebook  $notebook
    //  * @return \Illuminate\Auth\Access\Response|bool
    //  */
    // public function forceDelete(User $user, Notebook $notebook)
    // {
    //     return $this->view($user, $notebook);
    // }
}
