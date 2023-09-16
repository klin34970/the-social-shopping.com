@inject('request', 'Illuminate\Http\Request')
<nav class="left-menu" left-menu>
    <div class="logo-container">
        <a href="{{route('backend.home')}}" class="logo">
            <img src="/imgs/logo/logo-grey.png" alt="{{trans('backend/global.app_name')}}" />
            <img class="logo-inverse" src="/imgs/logo/logo.png" alt="{{trans('backend/global.app_name')}}" />
        </a>
    </div>
    <div class="left-menu-inner scroll-pane">
        <ul class="left-menu-list left-menu-list-root list-unstyled">
		
            <li class="left-menu-list-submenu left-menu-list-color-danger {{ (($request->segment(2) == 'dashboard')) ? 'left-menu-list-active' : '' }}">
                <a class="left-menu-link" href="{{ route('backend.dashboard.index') }}">
                    <i class="left-menu-link-icon icmn-chart"><!-- --></i>
                    @lang('backend/global.app_dashboard')
                </a>
            </li>
			
			@hasanyrole('shopper')
				<li class="left-menu-list-separator "><!-- --></li>
					<li class="left-menu-list-submenu left-menu-list-color-yellow {{ (($request->segment(2) == 'shop')) ? 'left-menu-list-active' : '' }}">
						<a class="left-menu-link" href="javascript: void(0);">
						<i class="left-menu-link-icon icmn-store"><!-- --></i>
						@lang('backend/global.app_shops')
						</a>
						<ul class="left-menu-list list-unstyled">
							@if(auth()->user()->can('shop_view'))
								<li>
									<a class="left-menu-link" href="{{ route('backend.shop.index') }}">
										@lang('backend/global.app_view')
									</a>
								</li>
							@endif
							@if(auth()->user()->can('shop_create'))
								<li>
									<a class="left-menu-link" href="{{ route('backend.shop.create') }}">
										@lang('backend/global.app_create')
									</a>
								</li>
							@endif
						</ul>
					</li>
				</li>
				
				<li class="left-menu-list-separator "><!-- --></li>
					<li class="left-menu-list-submenu left-menu-list-color-primary {{ (($request->segment(2) == 'supplier')) ? 'left-menu-list-active' : '' }}">
						<a class="left-menu-link" href="javascript: void(0);">
						<i class="left-menu-link-icon icmn-barcode"><!-- --></i>
						@lang('backend/global.app_suppliers')
						</a>
						<ul class="left-menu-list list-unstyled">
							@if(auth()->user()->can('supplier_view'))
								<li>
									<a class="left-menu-link" href="{{ route('backend.supplier.index') }}">
										@lang('backend/global.app_view')
									</a>
								</li>
							@endif
							@if(auth()->user()->can('supplier_create'))
								<li>
									<a class="left-menu-link" href="{{ route('backend.supplier.create') }}">
										@lang('backend/global.app_create')
									</a>
								</li>
							@endif
						</ul>
					</li>
				</li>
				
				@if(auth()->user()->shops->count() && auth()->user()->suppliers->count())
					<li class="left-menu-list-separator "><!-- --></li>
						<li class="left-menu-list-submenu left-menu-list-color-success {{ (($request->segment(2) == 'product')) ? 'left-menu-list-active' : '' }}">
							<a class="left-menu-link" href="javascript: void(0);">
							<i class="left-menu-link-icon icmn-bag"><!-- --></i>
							@lang('backend/global.app_products')
							</a>
							<ul class="left-menu-list list-unstyled">
								@if(auth()->user()->can('shop_product_view'))
									<li>
										<a class="left-menu-link" href="{{ route('backend.product.index') }}">
											@lang('backend/global.app_view')
										</a>
									</li>
								@endif
								@if(auth()->user()->can('shop_product_create'))
									<li>
										<a class="left-menu-link" href="{{ route('backend.product.create') }}">
											@lang('backend/global.app_create')
										</a>
									</li>
								@endif
							</ul>
						</li>
					</li>
				@endif
				
				@if(auth()->user()->orders_seller->count())
					<li class="left-menu-list-separator "><!-- --></li>
						<li class="left-menu-list-submenu left-menu-list-color-danger {{ (($request->segment(2) == 'order')) ? 'left-menu-list-active' : '' }}">
							<a class="left-menu-link" href="javascript: void(0);">
							<i class="left-menu-link-icon icmn-cart"><!-- --></i>
							@lang('backend/global.app_orders')
							</a>
							<ul class="left-menu-list list-unstyled">
								@if(auth()->user()->can('order_view'))
									<li>
										<a class="left-menu-link" href="{{ route('backend.order.index') }}">
											@lang('backend/global.app_view')
										</a>
									</li>
								@endif
							</ul>
						</li>
					</li>
				@endif
				
				@if(auth()->user()->orders_seller->count())
					<li class="left-menu-list-separator "><!-- --></li>
						<li class="left-menu-list-submenu left-menu-list-color-yellow {{ (($request->segment(2) == 'customer')) ? 'left-menu-list-active' : '' }}">
							<a class="left-menu-link" href="javascript: void(0);">
							<i class="left-menu-link-icon icmn-user3"><!-- --></i>
							@lang('backend/global.app_customers')
							</a>
							<ul class="left-menu-list list-unstyled">
								@if(auth()->user()->can('customer_view'))
									<li>
										<a class="left-menu-link" href="{{ route('backend.customer.index') }}">
											@lang('backend/global.app_view')
										</a>
									</li>
								@endif
							</ul>
						</li>
					</li>
				@endif
				
			@endhasanyrole
			
			
			
			@hasanyrole('administrator')
            <li class="left-menu-list-separator "><!-- --></li>
            <li class="left-menu-list-submenu left-menu-list-color-yellow {{ (($request->segment(2) == 'permissions') || ($request->segment(2) == 'roles') || ($request->segment(2) == 'users')) ? 'left-menu-list-active' : '' }}">
                <a class="left-menu-link" href="javascript: void(0);">
                    <i class="left-menu-link-icon icmn-skull"><!-- --></i>
                    @lang('backend/global.app_administration')
                </a>
				@can('users_manage')
					<ul class="left-menu-list list-unstyled">
						<li>
							<a class="left-menu-link" href="{{ route('backend.permissions.index') }}">
								@lang('backend/global.permissions.title')
							</a>
						</li>
						<li>
							<a class="left-menu-link" href="{{ route('backend.roles.index') }}">
								@lang('backend/global.roles.title')
							</a>
						</li>
						<li>
							<a class="left-menu-link" href="{{ route('backend.users.index') }}">
								@lang('backend/global.users.title')
							</a>
						</li>
					</ul>
				@endcan
            </li>
			@endhasanyrole
			
        </ul>
    </div>
</nav>