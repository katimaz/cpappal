<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function hasInventoryModular(User $user)
    {
        $accesses= $user->getAccess();
        foreach($accesses as $access){
            if($access->permission_name == "access.inventory"){
                return true;
            }
        }
        return false;
    }
}
