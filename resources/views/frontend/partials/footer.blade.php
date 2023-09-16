<div class="container">
	<div class="row">
	<!-- Footer Block -->
		<div class="cwt__block cwt__footer">
			<div class="cwt__footer__bottom">
				<nav class="nav nav-inline m-b-2 pull-md-right">
					<a href="{{URL::route('tac')}}" class="cwt__footer__link m-r-1">@lang('terms_and_conditions.title')</a>
					<a href="{{URL::route('pp')}}" class="cwt__footer__link m-r-1">@lang('privacy_policy.title')</a>
					<a href="javascript: void(0);" class="cwt__footer__link">Contact Us</a>
				</nav>
				<div class="cwt__footer__company">
					<img class="cwt__footer__company-logo" src="/imgs/logo/logo-i.png" title="@lang('frontend/global.app_name')" />
						<span>
							©2017 <a href="{{route('home')}}" class="cwt__footer__link" target="_blank">@lang('frontend/global.app_name')</a>
							<br />
							@lang('frontend/global.app_copyright')
						</span>
				</div>
			</div>
		</div>
	</div>
</div>

