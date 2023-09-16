$('.gallery').lightGallery({
	thumbnail:true
});
$('.cui-ecommerce--product--info ul.nav li a.nav-link:first').addClass('active');
$('.cui-ecommerce--product--info .tab-content .tab-pane:first').addClass('active');

$("select[name^='attributes']").change(function() {
	
	var options = $("select[name^='attributes'] option:selected");
	var values = $.map(options ,function(option) {
		return [ [$(option).parent().attr('id'), option.value] ];
	});
	
	$.ajax({
		type: 'POST',
		url: variant,
		dataType: "html",
		data: {attributes: values},
		beforeSend: function(xhr) {
			xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
		},
		success: function(data) {
			data = JSON.parse(data);
			$('#item-status').html(data.message.itemstatus);
			$('#item-sku').html(data.message.itemssku);
			$('#item-price').html(data.message.itemsprice);
			$('#item-quantity').html(data.message.itemsqty);
		},
	});
});

$("select[name^='attributes']:first").change();


$('#show-customer-details').on('click', function(){
	$(this).hide();
});

//STRIPE
//Publishable key
var stripe = Stripe(stripe_key);
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
		color: '#fb434a',
		iconColor: '#fb434a'
	},
	complete: {
		color: '#449d44',
		iconColor: '#449d44'
	}
};
var card = elements.create('card', {style: style, hidePostalCode: true});
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

var form = document.getElementById('order');
form.addEventListener('submit', function(event) 
{
	event.preventDefault();
	stripe.createToken(card).then(function(result) 
	{
		if (result.error) 
		{
			// Inform the user if there was an error
			var errorElement = document.getElementById('card-errors');
			errorElement.textContent = result.error.message;
		} 
		else 
		{
			// Send the token to your server
			stripeTokenHandler(result.token);
		}
	});
});

function stripeTokenHandler(token){
	// Insert the token ID into the form so it gets submitted to the server
	var form = document.getElementById('order');
	var hiddenInput = document.createElement('input');
	hiddenInput.setAttribute('type', 'hidden');
	hiddenInput.setAttribute('name', 'stripeToken');
	hiddenInput.setAttribute('value', token.id);
	form.appendChild(hiddenInput);
	
	// Submit the form
	form.submit();
}