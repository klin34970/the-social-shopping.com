<!DOCTYPE html>
<html>
	<head lang="en">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ $product->shop->company }} - {{ $product->title }}</title>
		
		<!-- Custom styling plus plugins -->
		<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900' rel='stylesheet' type='text/css'>
		<link href="{{ elixir('css/backend.css') }}" rel="stylesheet">
		<link rel="apple-touch-icon" sizes="180x180" href="/imgs/logo/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/imgs/logo/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/imgs/logo/favicon-16x16.png">
		<link rel="manifest" href="/imgs/logo/manifest.json">
		<link rel="mask-icon" href="/imgs/logo/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" href="/imgs/logo/favicon.ico">
		<meta name="msapplication-config" content="/imgs/logo/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">
		
		<meta property="og:title" 					content="{{ $product->shop->company }} - {{ $product->title }}" />
		<meta property="og:description" 			content="{{ $product->short_description }}" />
		<meta property="og:type" 					content="product.item" />
		<meta property="og:image" 					content="/storage{{ $product->thumbnail . $product->id . '/' . File::basename(File::glob(storage_path('app/public') . $product->thumbnail . $product->id . '/200x200.*')[0])}}" />
		<meta property="og:image:width"        		content="200" /> 
		<meta property="og:image:height"        	content="200" /> 
		<meta property="product:retailer_item_id" 	content="{{ $product->unique_id }}" /> 
		<meta property="product:price:amount"     	content="{{ $product->price }}" /> 
		<meta property="product:price:currency"   	content="eur" /> 
		<meta property="product:availability"     	content="in stock" /> 
		<meta property="product:condition"        	content="new" /> 
		
		
		@if($product->shop->facebook_pixel)
			<!-- Facebook Pixel Code -->
			<script>
				!function(f,b,e,v,n,t,s)
				{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
				n.callMethod.apply(n,arguments):n.queue.push(arguments)};
				if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
				n.queue=[];t=b.createElement(e);t.async=!0;
				t.src=v;s=b.getElementsByTagName(e)[0];
				s.parentNode.insertBefore(t,s)}(window, document,'script',
				'https://connect.facebook.net/en_US/fbevents.js');
				fbq('init', '{{ $product->shop->facebook_pixel->facebook_pixel_code }}', 
				{
				});
				fbq('track', 'PageView');
				fbq('track', 'Purchase');
			</script>
			<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=285420091967398&ev=PageView&noscript=1"/></noscript>
			<!-- End Facebook Pixel Code -->

		@endif
			
	</head>
	
	<body class="theme-default">
		<section class="page-content">
			<div class="page-content-inner">
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						@lang('backend/global.fields-errors')
						<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<section class="panel panel-with-borders">
					<div class="panel-heading">
						<h2>
							@lang('frontend/global.product.details')
						</h2>
					</div>
					<div class="panel-body">
						@if(!$product->shop->count())
							Product doesnt have a shop
						@elseif(!$product->active)
							Product not active
						@elseif(!$product->supplier)
							This product doesnt have a supplier
						@elseif(!$product->shop->currency)
							This shop doesnt have available currency
						@elseif($product->user->banned)
							The Seller has been banned
						@elseif($product->virtual_stock > 0 && $product->orders->count() >= $product->virtual_stock)
							Product out of stock
						@elseif(!$product->shop->stripe)
							Product cannot be buy
						@else
							@include('frontend.product.product')
						@endif
					</div>
					
				</section>
				
			</div>
		</section>
		@if($product->shop->products()->count() > config('tss.related_product_min'))
			@include('frontend.product.related')
		@endif
		
		<div class="main-backdrop">
			<!-- -->
		</div>
		<script src="{{ elixir('js/backend.js') }}"></script>
		<script>
			$(function() {
				window._token = '{{ csrf_token() }}';
		</script>
	</body>
</html>

