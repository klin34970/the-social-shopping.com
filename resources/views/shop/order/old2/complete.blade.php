<!DOCTYPE html>
<html>
	<head lang="en">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ $order->product_title }} - {{ $order->reference  }}</title>
		
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
				fbq('track', 'InitiateCheckout');
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
							@lang('frontend/global.order.complete')
						</h2>
					</div>
					<div class="panel-body">
						
					</div>
				</section>
				
			</div>
		</section>
		<div class="main-backdrop">
			<!-- -->
		</div>
		<script src="{{ elixir('js/backend.js') }}"></script>
		<script src="https://js.stripe.com/v3/"></script>
		<script>
			window._token = '{{ csrf_token() }}';
		</script>
	</body>
</html>
