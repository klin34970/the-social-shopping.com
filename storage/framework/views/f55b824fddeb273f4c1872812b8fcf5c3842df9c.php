<?php $request = app('Illuminate\Http\Request'); ?>
<nav class="left-menu" left-menu>
    <div class="logo-container">
        <a href="<?php echo e(route('backend.home')); ?>" class="logo">
            <img src="/imgs/logo/logo-grey.png" alt="<?php echo e(trans('backend/global.app_name')); ?>" />
            <img class="logo-inverse" src="/imgs/logo/logo.png" alt="<?php echo e(trans('backend/global.app_name')); ?>" />
        </a>
    </div>
    <div class="left-menu-inner scroll-pane">
        <ul class="left-menu-list left-menu-list-root list-unstyled">
		
            <li class="left-menu-list-submenu left-menu-list-color-danger <?php echo e((($request->segment(2) == 'dashboard')) ? 'left-menu-list-active' : ''); ?>">
                <a class="left-menu-link" href="<?php echo e(route('backend.dashboard.index')); ?>">
                    <i class="left-menu-link-icon icmn-chart"><!-- --></i>
                    <?php echo app('translator')->getFromJson('backend/global.app_dashboard'); ?>
                </a>
            </li>
			
			<?php if(auth()->check() && auth()->user()->hasAnyRole('shopper')): ?>
				<li class="left-menu-list-separator "><!-- --></li>
					<li class="left-menu-list-submenu left-menu-list-color-yellow <?php echo e((($request->segment(2) == 'shop')) ? 'left-menu-list-active' : ''); ?>">
						<a class="left-menu-link" href="javascript: void(0);">
						<i class="left-menu-link-icon icmn-store"><!-- --></i>
						<?php echo app('translator')->getFromJson('backend/global.app_shops'); ?>
						</a>
						<ul class="left-menu-list list-unstyled">
							<?php if(auth()->user()->can('shop_view')): ?>
								<li>
									<a class="left-menu-link" href="<?php echo e(route('backend.shop.index')); ?>">
										<?php echo app('translator')->getFromJson('backend/global.app_view'); ?>
									</a>
								</li>
							<?php endif; ?>
							<?php if(auth()->user()->can('shop_create')): ?>
								<li>
									<a class="left-menu-link" href="<?php echo e(route('backend.shop.create')); ?>">
										<?php echo app('translator')->getFromJson('backend/global.app_create'); ?>
									</a>
								</li>
							<?php endif; ?>
						</ul>
					</li>
				</li>
				
				<li class="left-menu-list-separator "><!-- --></li>
					<li class="left-menu-list-submenu left-menu-list-color-primary <?php echo e((($request->segment(2) == 'supplier')) ? 'left-menu-list-active' : ''); ?>">
						<a class="left-menu-link" href="javascript: void(0);">
						<i class="left-menu-link-icon icmn-barcode"><!-- --></i>
						<?php echo app('translator')->getFromJson('backend/global.app_suppliers'); ?>
						</a>
						<ul class="left-menu-list list-unstyled">
							<?php if(auth()->user()->can('supplier_view')): ?>
								<li>
									<a class="left-menu-link" href="<?php echo e(route('backend.supplier.index')); ?>">
										<?php echo app('translator')->getFromJson('backend/global.app_view'); ?>
									</a>
								</li>
							<?php endif; ?>
							<?php if(auth()->user()->can('supplier_create')): ?>
								<li>
									<a class="left-menu-link" href="<?php echo e(route('backend.supplier.create')); ?>">
										<?php echo app('translator')->getFromJson('backend/global.app_create'); ?>
									</a>
								</li>
							<?php endif; ?>
						</ul>
					</li>
				</li>
				
				<?php if(auth()->user()->shops->count() && auth()->user()->suppliers->count()): ?>
					<li class="left-menu-list-separator "><!-- --></li>
						<li class="left-menu-list-submenu left-menu-list-color-success <?php echo e((($request->segment(2) == 'product')) ? 'left-menu-list-active' : ''); ?>">
							<a class="left-menu-link" href="javascript: void(0);">
							<i class="left-menu-link-icon icmn-bag"><!-- --></i>
							<?php echo app('translator')->getFromJson('backend/global.app_products'); ?>
							</a>
							<ul class="left-menu-list list-unstyled">
								<?php if(auth()->user()->can('shop_product_view')): ?>
									<li>
										<a class="left-menu-link" href="<?php echo e(route('backend.product.index')); ?>">
											<?php echo app('translator')->getFromJson('backend/global.app_view'); ?>
										</a>
									</li>
								<?php endif; ?>
								<?php if(auth()->user()->can('shop_product_create')): ?>
									<li>
										<a class="left-menu-link" href="<?php echo e(route('backend.product.create')); ?>">
											<?php echo app('translator')->getFromJson('backend/global.app_create'); ?>
										</a>
									</li>
								<?php endif; ?>
							</ul>
						</li>
					</li>
				<?php endif; ?>
				
				<?php if(auth()->user()->orders_seller->count()): ?>
					<li class="left-menu-list-separator "><!-- --></li>
						<li class="left-menu-list-submenu left-menu-list-color-danger <?php echo e((($request->segment(2) == 'order')) ? 'left-menu-list-active' : ''); ?>">
							<a class="left-menu-link" href="javascript: void(0);">
							<i class="left-menu-link-icon icmn-cart"><!-- --></i>
							<?php echo app('translator')->getFromJson('backend/global.app_orders'); ?>
							</a>
							<ul class="left-menu-list list-unstyled">
								<?php if(auth()->user()->can('order_view')): ?>
									<li>
										<a class="left-menu-link" href="<?php echo e(route('backend.order.index')); ?>">
											<?php echo app('translator')->getFromJson('backend/global.app_view'); ?>
										</a>
									</li>
								<?php endif; ?>
							</ul>
						</li>
					</li>
				<?php endif; ?>
				
				<?php if(auth()->user()->orders_seller->count()): ?>
					<li class="left-menu-list-separator "><!-- --></li>
						<li class="left-menu-list-submenu left-menu-list-color-yellow <?php echo e((($request->segment(2) == 'customer')) ? 'left-menu-list-active' : ''); ?>">
							<a class="left-menu-link" href="javascript: void(0);">
							<i class="left-menu-link-icon icmn-user3"><!-- --></i>
							<?php echo app('translator')->getFromJson('backend/global.app_customers'); ?>
							</a>
							<ul class="left-menu-list list-unstyled">
								<?php if(auth()->user()->can('customer_view')): ?>
									<li>
										<a class="left-menu-link" href="<?php echo e(route('backend.customer.index')); ?>">
											<?php echo app('translator')->getFromJson('backend/global.app_view'); ?>
										</a>
									</li>
								<?php endif; ?>
							</ul>
						</li>
					</li>
				<?php endif; ?>
				
			<?php endif; ?>
			
			
			
			<?php if(auth()->check() && auth()->user()->hasAnyRole('administrator')): ?>
            <li class="left-menu-list-separator "><!-- --></li>
            <li class="left-menu-list-submenu left-menu-list-color-yellow <?php echo e((($request->segment(2) == 'permissions') || ($request->segment(2) == 'roles') || ($request->segment(2) == 'users')) ? 'left-menu-list-active' : ''); ?>">
                <a class="left-menu-link" href="javascript: void(0);">
                    <i class="left-menu-link-icon icmn-skull"><!-- --></i>
                    <?php echo app('translator')->getFromJson('backend/global.app_administration'); ?>
                </a>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users_manage')): ?>
					<ul class="left-menu-list list-unstyled">
						<li>
							<a class="left-menu-link" href="<?php echo e(route('backend.permissions.index')); ?>">
								<?php echo app('translator')->getFromJson('backend/global.permissions.title'); ?>
							</a>
						</li>
						<li>
							<a class="left-menu-link" href="<?php echo e(route('backend.roles.index')); ?>">
								<?php echo app('translator')->getFromJson('backend/global.roles.title'); ?>
							</a>
						</li>
						<li>
							<a class="left-menu-link" href="<?php echo e(route('backend.users.index')); ?>">
								<?php echo app('translator')->getFromJson('backend/global.users.title'); ?>
							</a>
						</li>
					</ul>
				<?php endif; ?>
            </li>
			<?php endif; ?>
			
        </ul>
    </div>
</nav>