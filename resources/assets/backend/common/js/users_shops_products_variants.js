$('body').on("keypress", '#tvariants input', function(e){
	if (event.keyCode == 13) {
		e.preventDefault();
	}
});

var t = $('#tvariants').DataTable({ 
	"responsive" : true,
	"paging":   true,
	"ordering": true,
	"info":     true,
	"filter":	true,
	"autoWidth": true,
	"lengthChange": true,
	columnDefs: [ 
		{ targets:"_all"},
		{ targets:[0,1,2,3,4,5], className: "desktop" },
		{ targets:[0], className: "tablet, mobile" }
	]
});

function populate_combinations(message = true)
{
	$.ajax({
		type: 'GET',
		url: variants,
		dataType: "html",
		beforeSend: function(xhr) {
			xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
		},
		success : function(data) {
			data = JSON.parse(data);
			t.clear();
			var $r = data.message.html;
			for (var i = 0; i < $r.length; i++) {
					t.row.add($r[i]);
			}
			t.draw();
			if(message)
			{
				$.notify({
					message: data.message.message
					},{
						type: "success"
					});
			}
		}
	});
}

$('body').on("click", '#tvariants .process-variants div[role="button-save-variants"]', function(){
	container = $(this).parent();
	id = container.data('id') ? container.data('id') : 0;
	attributes_values = container.data('attributes-values') ? container.data('attributes-values') : 0;
	tr = container.parent().parent();
	
	variants_sku = tr.find('input[name="variant_sku"]');
	variants_price = tr.find('input[name="variant_price"]');
	variants_price_discount = tr.find('input[name="variant_price_discount"]');
	variants_virtual_stock = tr.find('input[name="variant_virtual_stock"]');
	
	if(variants_price.val())
	{
		$.ajax({
			type: 'POST',
			url: variant_create,
			dataType: "html",
			data: {variants_id: id, attributes_values: attributes_values.split(', '), variants_sku: variants_sku.val(), variants_price: variants_price.val(), variants_price_discount: variants_price_discount.val(), variants_virtual_stock: variants_virtual_stock.val()},
			beforeSend: function(xhr) 
			{
				xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
			},
			success: function(data) 
			{
				data = JSON.parse(data);
				container.attr('data-id', data.message.id);
				container.html('<div role="button-save-variants" class="btn btn-success margin-right-10">'+sSave+'</div><div role="button-delete-variants" class="btn btn-danger">'+sDelete+'</div>');
				
				$.notify({
					message: data.message.message
				},{
					type: "success"
				});
			},
			error: function(data)
			{
				message = JSON.parse(data.responseText).error;
				$.notify({
					message: message
				},{
					type: 'danger'
				});
			}
		});
	}
})

$('body').on("click", '#tvariants .process-variants div[role="button-delete-variants"]', function(){
	container = $(this).parent();
	id = container.data('id') ? container.data('id') : 0;
	
	$.ajax({
		type: 'DELETE',
		url: variant_delete,
		dataType: "html",
		data: {id: id},
		beforeSend: function(xhr) {
			xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
		},
		success: function(data) {
			data = JSON.parse(data);
			container.html('<div role="button-save-variants" class="btn btn-success margin-right-10">'+sSave+'</div>');
			$.notify({
				message: data.message
			},{
				type: 'success'
			});
			populate_combinations();
		}
	});
})