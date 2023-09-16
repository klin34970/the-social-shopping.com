<div class="cwt__footer visible-footer">
    <div class="cwt__footer__top">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a target="_blank" href="{{URL::route('tac')}}" class="cwt__footer__link">@lang('terms_and_conditions.title')</a></li>
							<li><a target="_blank" href="{{URL::route('pp')}}" class="cwt__footer__link">@lang('privacy_policy.title')</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cwt__footer__title">
                    The Social Shopping
                </div>
                <div class="cwt__footer__description">
                    <p>
						{{trans("frontend/global.app_showcase.text1")}}
						<br>
						{{trans("frontend/global.app_showcase.text2")}}
						<br>
						{{trans("frontend/global.app_showcase.text3")}}
					</p>
                </div>
            </div>
        </div>
    </div>
    <div class="cwt__footer__bottom">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <div class="cwt__footer__company">
                    <img class="cwt__footer__company-logo" src="/imgs/logo/logo-i.png" target="_blank" title="{{ trans('backend/global.app_name') }}">
                    <span>
                        © 2016 <a href="{{route('backend.home')}}" class="cwt__footer__link" target="_blank">{{ trans('backend/global.app_name') }}</a>
                        <br>
                        All rights reserved
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
