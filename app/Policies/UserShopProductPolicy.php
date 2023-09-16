<?php

namespace App\Policies;

use App\User;
use App\Http\Models\Backend\UserShopProductModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserShopProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the userShopProductModel.
     *
     * @param  \App\User  $user
     * @param  \App\UserShopProductModel  $userShopProductModel
     * @return mixed
     */
    public function view(User $user, UserShopProductModel $userShopProductModel)
    {
        return ($user->id === $userShopProductModel->user_id && $user->can('shop_product_view')) || $user->can('shop_product_manage');
    }

    /**
     * Determine whether the user can create userShopProductModels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
		$shops = $user->shops->count();
		$suppliers = $user->suppliers->count();
		$products = $user->products->count();
        return ($shops && $suppliers && $products < config('tss.guest_product_max') && $user->can('shop_product_create')) || $user->can('shop_product_manage');
    }

    /**
     * Determine whether the user can update the userShopProductModel.
     *
     * @param  \App\User  $user
     * @param  \App\UserShopProductModel  $userShopProductModel
     * @return mixed
     */
    public function update(User $user, UserShopProductModel $userShopProductModel)
    {
        return ($user->id === $userShopProductModel->user_id && $user->can('shop_product_update')) || $user->can('shop_product_manage');
    }

    /**
     * Determine whether the user can delete the userShopProductModel.
     *
     * @param  \App\User  $user
     * @param  \App\UserShopProductModel  $userShopProductModel
     * @return mixed
     */
    public function delete(User $user, UserShopProductModel $userShopProductModel)
    {
        return ($user->id === $userShopProductModel->user_id && $user->can('shop_product_delete')) || $user->can('shop_product_manage');
    }
}
