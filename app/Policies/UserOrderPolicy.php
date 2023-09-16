<?php

namespace App\Policies;

use App\User;
use App\Http\Models\Frontend\UserOrderModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserOrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the userOrderModel.
     *
     * @param  \App\User  $user
     * @param  \App\UserOrderModel  $userOrderModel
     * @return mixed
     */
    public function view(User $user, UserOrderModel $userOrderModel)
    {
        return ( ($user->id === $userOrderModel->seller_id || $user->id === $userOrderModel->customer_id) && $user->can('order_view')) || $user->can('order_manage');
    }

    /**
     * Determine whether the user can create userOrderModels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->can('order_create')) || $user->can('order_manage');
    }

    /**
     * Determine whether the user can update the userOrderModel.
     *
     * @param  \App\User  $user
     * @param  \App\UserOrderModel  $userOrderModel
     * @return mixed
     */
    public function update(User $user, UserOrderModel $userOrderModel)
    {
        return ($user->id === $userOrderModel->seller_id && $user->can('order_update')) || $user->can('order_manage');
    }

    /**
     * Determine whether the user can delete the userOrderModel.
     *
     * @param  \App\User  $user
     * @param  \App\UserOrderModel  $userOrderModel
     * @return mixed
     */
    public function delete(User $user, UserOrderModel $userOrderModel)
    {
        return ($user->id === $userOrderModel->seller_id && $user->can('order_delete')) || $user->can('order_manage');
    }
}
