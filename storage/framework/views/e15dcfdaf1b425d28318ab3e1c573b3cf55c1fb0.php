<?php $__env->startSection('head'); ?>
	<!-- Custom styling plus plugins -->
	<title><?php echo e($product->shop->company); ?> - <?php echo e($product->title); ?></title>
	<link rel="apple-touch-icon" sizes="180x180" href="/imgs/logo/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/imgs/logo/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/imgs/logo/favicon-16x16.png">
	<link rel="manifest" href="/imgs/logo/manifest.json">
	<link rel="mask-icon" href="/imgs/logo/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="/imgs/logo/favicon.ico">
	<meta name="msapplication-config" content="/imgs/logo/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	
	<meta property="og:title" 					content="<?php echo e($product->shop->company); ?> - <?php echo e($product->title); ?>" />
	<meta property="og:description" 			content="<?php echo e($product->short_description); ?>" />
	<meta property="og:type" 					content="product.item" />
	<?php if($product->images->count()): ?>
		<meta property="og:image" 					content="/storage/users/<?php echo e($product->user_id); ?>/products/<?php echo e($product->id); ?>/gallery/<?php echo e(File::basename(File::glob(storage_path('app/public') . '/users/' . $product->user_id . '/products/' . $product->id . '/gallery/' . $product->images->first()->filename . '_200x200.*')[0])); ?>" />
	<?php endif; ?>
	<meta property="og:image:width"        		content="200" /> 
	<meta property="og:image:height"        	content="200" /> 
	<meta property="product:retailer_item_id" 	content="<?php echo e($product->unique_id); ?>" /> 
	<meta property="product:price:amount"     	content="<?php echo e($product->price_discount ? $product->price_discount : $product->price); ?>" /> 
	<meta property="product:price:currency"   	content="eur" /> 
	<meta property="product:availability"     	content="in stock" /> 
	<meta property="product:condition"        	content="new" /> 
	
	
	<?php if($product->shop->facebook_pixel): ?>
		<!-- Facebook Pixel Code -->
		<script>
			!function(f,b,e,v,n,t,s)
			{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t,s)}(window, document,'script','https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', '<?php echo e($product->shop->facebook_pixel->facebook_pixel_code); ?>', 
			{
			});
			fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo e($product->shop->facebook_pixel->facebook_pixel_code); ?>&ev=PageView&noscript=1"/></noscript>
		<!-- End Facebook Pixel Code -->

	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="cwt__block cwt__header-fixed">
        <div class="container">
            <div class="cwt__header-fixed__container">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="cwt__logo cwt__logo--small2">
                            <a href="<?php echo e(Request::url()); ?>">
								<?php if($product->shop->logo): ?>
									<img style="height:50px;width:auto;" src="/storage<?php echo e($product->shop->logo . $product->shop->id . '/' . File::basename(File::glob(storage_path('app/public') . $product->shop->logo . $product->shop->id . '/50x50.*')[0])); ?>" alt="<?php echo e($product->shop->company); ?>" />
								<?php endif; ?>
								<div class="shoplogo"><?php echo e($product->shop->company); ?></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="cwt__block cwt__utils__p-t-100 bg-white">
			
			<?php if(!$product->shop->count()): ?>
				Product doesnt have a shop
			<?php elseif(!$product->active): ?>
				Product not active
			<?php elseif(!$product->supplier): ?>
				This product doesnt have a supplier
			<?php elseif(!$product->shop->currency): ?>
				This shop doesnt have available currency
			<?php elseif($product->user->banned): ?>
				The Seller has been banned
			<?php elseif($product->virtual_stock > 0 && $product->orders->count() >= $product->virtual_stock): ?>
				Product out of stock
			<?php elseif(!$product->shop->stripe): ?>
				Product cannot be buy
			<?php else: ?>
				<?php echo $__env->make('shop.product.product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php if($product->shop->products()->count() > config('tss.related_product_min')): ?>
					<?php echo $__env->make('shop.product.related', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endif; ?>
			<?php endif; ?>
            </div>
			
        </div>
    </div>

	<?php echo $__env->make('shop.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pre-javascript'); ?>
	<script src="https://js.stripe.com/v3/"></script>
	<script>
		var csrf_token = "<?php echo e(csrf_token()); ?>";
		var variant = "<?php echo e(URL::route('product.store.session.attributes', ['unique_id' => $product->unique_id])); ?>";
		var stripe_key = "<?php echo e($product->shop->stripe->key_public); ?>";
	</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script>
		$("#phone_1").intlTelInput();
		$("#phone_2").intlTelInput();
		$("#phone_1").intlTelInput("setCountry", "<?php echo e(isset($geoip['iso_code']) ? $geoip['iso_code'] : 'us'); ?>");
		$("#phone_2").intlTelInput("setCountry", "<?php echo e(isset($geoip['iso_code']) ? $geoip['iso_code'] : 'us'); ?>");

		$("#country").countrySelect();
		$("#country").countrySelect("setCountry", "<?php echo e(isset($geoip['country']) ? $geoip['country'] : ((Auth::user() && Auth::user()->addresses->count()) ? Auth::user()->addresses()->first()->country : 'us')); ?>");
	</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('shop.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>