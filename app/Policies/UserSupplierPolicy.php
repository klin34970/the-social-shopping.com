<?php

namespace App\Policies;

use App\User;
use App\Http\Models\Backend\UserSupplierModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserSupplierPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the userSupplierModel.
     *
     * @param  \App\User  $user
     * @param  \App\UserSupplierModel  $userSupplierModel
     * @return mixed
     */
    public function view(User $user, UserSupplierModel $userSupplierModel)
    {
        return ($user->id === $userSupplierModel->user_id && $user->can('supplier_view')) || $user->can('supplier_manage');
    }

    /**
     * Determine whether the user can create userSupplierModels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
		$suppliers = $user->suppliers->count();
        return ($suppliers < config('tss.guest_supplier_max') && $user->can('supplier_create')) || $user->can('supplier_manage');
    }

    /**
     * Determine whether the user can update the userSupplierModel.
     *
     * @param  \App\User  $user
     * @param  \App\UserSupplierModel  $userSupplierModel
     * @return mixed
     */
    public function update(User $user, UserSupplierModel $userSupplierModel)
    {
        return ($user->id === $userSupplierModel->user_id && $user->can('supplier_update')) || $user->can('supplier_manage');
    }

    /**
     * Determine whether the user can delete the userSupplierModel.
     *
     * @param  \App\User  $user
     * @param  \App\UserSupplierModel  $userSupplierModel
     * @return mixed
     */
    public function delete(User $user, UserSupplierModel $userSupplierModel)
    {
        return ($user->id === $userSupplierModel->user_id && $user->can('supplier_delete')) || $user->can('supplier_manage');
    }
}
