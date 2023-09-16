<?php

namespace App\Policies;

use App\User;
use App\Http\Models\Backend\UserShopModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserShopPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the userShopModel.
     *
     * @param  \App\User  $user
     * @param  \App\UserShopModel  $userShopModel
     * @return mixed
     */
    public function view(User $user, UserShopModel $userShopModel)
    {
        return ($user->id === $userShopModel->user_id && $user->can('shop_view')) || $user->can('shop_manage');
    }

    /**
     * Determine whether the user can create userShopModels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
		$shops = $user->shops->count();
        return ($shops < config('tss.guest_shop_max') && $user->can('shop_create')) || $user->can('shop_manage');
    }

    /**
     * Determine whether the user can update the userShopModel.
     *
     * @param  \App\User  $user
     * @param  \App\UserShopModel  $userShopModel
     * @return mixed
     */
    public function update(User $user, UserShopModel $userShopModel)
    {
        return ($user->id === $userShopModel->user_id && $user->can('shop_update')) || $user->can('shop_manage');
    }

    /**
     * Determine whether the user can delete the userShopModel.
     *
     * @param  \App\User  $user
     * @param  \App\UserShopModel  $userShopModel
     * @return mixed
     */
    public function delete(User $user, UserShopModel $userShopModel)
    {
        return ($user->id === $userShopModel->user_id && $user->can('shop_delete')) || $user->can('shop_manage');
    }
}
