<?php

namespace Oxygencms\Pages\Policies;

use Oxygencms\Users\Models\User;
use Oxygencms\Core\Policies\BasePolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     *
     * @return mixed
     */
    public function index(User $user)
    {
        if ($user->can('view_pages') || $user->can('manage_pages')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create pages.
     *
     * @param User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('create_page') || $user->can('manage_pages')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the page.
     *
     * @param User $user
     *
     * @return mixed
     */
    public function update(User $user)
    {
        if ($user->can('update_page') || $user->can('manage_pages')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the page.
     *
     * @param User $user
     *
     * @return mixed
     */
    public function delete(User $user)
    {
        if ($user->can('delete_page') || $user->can('manage_pages')) {
            return true;
        }

        return false;
    }
}
