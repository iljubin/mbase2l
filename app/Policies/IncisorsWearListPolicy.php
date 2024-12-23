<?php

namespace App\Policies;

use App\Models\Base\BaseList;
use App\Models\IncisorsWearList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IncisorsWearListPolicy extends BaseListPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\List  $baseList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, BaseList $baseList)
    {
        return $baseList->isDeletable();
    }
}
