<div class="container">
	<div class="row">
	<!-- Footer Block -->
		<div class="cwt__block cwt__footer">
			<div class="cwt__footer__bottom">
				<nav class="nav nav-inline m-b-2 pull-md-right">
					<a href="<?php echo e(URL::route('tac')); ?>" class="cwt__footer__link m-r-1"><?php echo app('translator')->getFromJson('terms_and_conditions.title'); ?></a>
					<a href="<?php echo e(URL::route('pp')); ?>" class="cwt__footer__link m-r-1"><?php echo app('translator')->getFromJson('privacy_policy.title'); ?></a>
					<a href="mailto::<?php echo e($product->shop->email); ?>" class="cwt__footer__link">Contact Us</a>
				</nav>
				<div class="cwt__footer__company">
					<img class="cwt__footer__company-logo" src="/imgs/logo/logo-i.png" title="<?php echo app('translator')->getFromJson('frontend/global.app_name'); ?>" />
						<span>
							©2017 <a href="<?php echo e(route('home')); ?>" class="cwt__footer__link" target="_blank"><?php echo app('translator')->getFromJson('frontend/global.app_name'); ?></a>
							<br />
							<?php echo app('translator')->getFromJson('frontend/global.app_copyright'); ?>
						</span>
				</div>
			</div>
		</div>
	</div>
</div>

