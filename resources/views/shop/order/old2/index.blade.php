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
				fbq('track', 'AddPaymentInfo');
				fbq('track', 'AddToCart');
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
							@lang('shop/global.order.cart_checkout')
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
							<div class="cui-ecommerce--cart">
								{{ Form::open(['method' => 'POST', 'class' => 'cui-wizard', 'id' => 'cart-checkout', 'route' => ['order.index', 'unique_id' => $product->unique_id]]) }}
										@include('shop.order.cart')
										@include('shop.order.details')
										@include('shop.order.confirmation')
								{{ Form::close() }}
							</div>
						@endif
					</div>
					<div class="panel-footer">
						<small>@lang('shop/global.order.more_details')</small>
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
			$(function() {
				window._token = '{{ csrf_token() }}';



				$("#cart-checkout").validator();
				$("#cart-checkout").steps({
					headerTag: "h3",
					bodyTag: "section",
					transitionEffect: 'slideLeft',
					autoFocus: true,
					onInit: function (event, currentIndex) 
					{ 
						console.log(event);
					},
					onStepChanging: function (event, currentIndex, newIndex) 
					{
						$('input').each(function(){
							$('#s_' + $(this).attr('id')).text($(this).val());
						})
						
						$('form').find('#quantity').text(parseInt($('form').find('#input-quantity').val()));
						
						var hasErrors = $("#cart-checkout").validator('validate').has('.has-error').length;
						if (hasErrors) 
						{
							return false;
						} 
						else 
						{
							return $("#cart-checkout").validator('update');
						}	
					},
					onFinishing: function (event, currentIndex) 
					{
						var hasErrors = $("#cart-checkout").validator('validate').has('.has-error').length;
						if (hasErrors) 
						{
							return false;
						} 
						else 
						{
							return $("#cart-checkout").validator('update');
						}
					},
					onFinished: function (event, currentIndex) 
					{
						$('#phone_1').val($('#phone_1').intlTelInput("getNumber"));
						$('#phone_2').val($('#phone_2').intlTelInput("getNumber"));
						stripe.createToken(card).then(function(result) {
							if (result.error) {
								// Inform the user if there was an error
								var errorElement = document.getElementById('card-errors');
								errorElement.textContent = result.error.message;
							}else{
								// Send the token to your server
								stripeTokenHandler(result.token);
							}
						});
					}
				});
				
				
				$('#input-quantity').on("keyup keydown change",function(event)
				{
					if(parseInt($(this).val()) % 1 === 0)
					{
						$('form').find('.total').text(parseFloat(parseInt($(this).val()) * $('form').find('#price').text()).toFixed(2));
						$('form').find('#totalamount').text(parseFloat(parseInt($(this).val()) * $('form').find('#price').text()).toFixed(2));
						$('form').find('#quantity').text(parseInt($(this).val()));
						
						$('form').find('#subtotal').text( 
							parseFloat(
								parseFloat($('form').find('#price').text()) / parseFloat((1 + ({{$product->taxe}} / 100))) * parseInt($(this).val())
							).toFixed(2) 
						);
						
						$('form').find('#vat').text( parseFloat(parseFloat($('form').find('#totalamount').text()) - parseFloat($('form').find('#subtotal').text())).toFixed(2) );
					}
					else
					{
						$('form').find('.total').text(parseFloat($('form').find('#price').text()).toFixed(2));
						$('form').find('#totalamount').text(parseFloat($('form').find('#price').text()).toFixed(2));
					}
				});
				
				
				$('input').on("keyup keydown change",function(event)
				{
					$('#s_' + $(this).attr('id')).text($(this).val());
				});
				
				//STRIPE
				//Publishable key
				var stripe = Stripe('{{$product->shop->stripe->key_public}}');
				var elements = stripe.elements();
				
				var style = {
					base: {
						color: '#32325d',
						lineHeight: '24px',
						fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
						fontSmoothing: 'antialiased',
						fontSize: '16px',
						'::placeholder': {
							color: '#aab7c4'
						}
					},
					invalid: {
						color: '#fa755a',
						iconColor: '#fa755a'
					}
				};
				var card = elements.create('card', {style: style});
				card.mount('#card-element');
				
				card.addEventListener('change', function(event) {
					var displayError = document.getElementById('card-errors');
					if (event.error){
						displayError.textContent = event.error.message;
						displayError.className = 'alert alert-danger';
					}else{
						displayError.textContent = '';
						displayError.className = '';
					}
				});
				
				
				function stripeTokenHandler(token){
					// Insert the token ID into the form so it gets submitted to the server
					var form = document.getElementById('cart-checkout');
					var hiddenInput = document.createElement('input');
					hiddenInput.setAttribute('type', 'hidden');
					hiddenInput.setAttribute('name', 'stripeToken');
					hiddenInput.setAttribute('value', token.id);
					form.appendChild(hiddenInput);
					
					// Submit the form
					form.submit();
				}
				
				$("#phone_1").intlTelInput();
				$("#phone_2").intlTelInput();
				$("#phone_1").intlTelInput("setCountry", "{{ isset($geoip['iso_code']) ? $geoip['iso_code'] : 'us' }}");
				$("#phone_2").intlTelInput("setCountry", "{{ isset($geoip['iso_code']) ? $geoip['iso_code'] : 'us' }}");
				
				$("#country").countrySelect();
				$("#country").countrySelect("setCountry", "{{ isset($geoip['country']) ? $geoip['country'] : 'us' }}");
			});
		</script>
	</body>
</html>
