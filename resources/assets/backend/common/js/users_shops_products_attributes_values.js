/********************************** ATTRIBUTES VALUES ***********************************/
		
		$('#attributes #attributes-values-inputs #sortable-attributes-values').sortable({
			connectWith: "#sortable-attributes-values",
			containment: "parent",
		});
		$('#attributes #attributes-values-inputs #sortable-attributes-values').on('sortupdate',function(){
			var order = $(this).sortable('toArray', {attribute: 'data-id'});
			var parent_id = $(this).data('id');

			$.ajax({
				type: 'PUT',
				url: attribute_value_position,
				dataType: "html",
				data: {parent_id: parent_id, order: order},
				beforeSend: function(xhr) {
					xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
				}
			});
		});
		$('body').on("click", '#attributes-values div[role="button-attributes-values"]', function(){
			var ul = $(this).parent().parent().parent().find('#sortable-attributes-values');
			var tpl = $('<li class="ui-state-default">' +
				'<div class="row">' +
					'<div class="process-attributes-values"><div role="button-save-attributes-values" class="btn btn-success">'+sSave+'</div></div>' +
					'<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">' +
						'<div class="form-group"><input placeholder="value" class="form-control" name="attributes_values_value" type="text"></div>'+
					'</div>' +
				'</div>' +
			'</li>');							
			tpl.appendTo(ul);
		});
		$('body').on("click", '#attributes #attributes-values-inputs .process-attributes-values div[role="button-save-attributes-values"]', function(){
			
			container = $(this).parent().parent().parent();
			ul = container.parent();
			
			id = container.data('id') ? container.data('id') : 0;
			parent_id = container.parent().data('id');
			attributes_values_value = container.find('input[name="attributes_values_value"]');
			if(parent_id && attributes_values_value.val())
			{
				$.ajax({
					type: 'POST',
					url: attribute_value_create,
					dataType: "html",
					data: {parent_id: parent_id, attributes_values_id: id, attributes_values_value: attributes_values_value.val()},
					beforeSend: function(xhr) 
					{
						xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
					},
					success: function(data) 
					{
						data = JSON.parse(data);
						container.find('.form-group').removeClass('has-error');
						
						container.attr('data-id', data.message.id);
						container.find('.process-attributes-values').html('<div role="button-save-attributes-values" class="btn btn-success">'+sSave+'</div><div role="button-delete-attributes-values" class="btn btn-danger">'+sDelete+'</div>');
					
						ul.trigger('sortupdate');
						
						$.notify({
							message: data.message.message
						},{
							type: "success"
						});
						
						populate_combinations();
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
			else
			{
				$(this).parent().parent().find('.form-group').addClass('has-error');
			}
		});
		$('body').on("click", '#attributes #attributes-values-inputs .process-attributes-values div[role="button-delete-attributes-values"]', function(){
			container = $(this).parent().parent().parent();
			ul = container.parent();
			id = container.data('id') ? container.data('id') : 0;
			$.ajax({
				type: 'DELETE',
				url: attribute_value_delete,
				dataType: "html",
				data: {id: id},
				beforeSend: function(xhr) {
					xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
				},
				success: function(data) {
					data = JSON.parse(data);
					container.fadeOut(500, function(){ 
						$(this).remove();
						ul.trigger('sortupdate');
						
						$.notify({
							message: data.message
						},{
							type: 'success'
						});
					});
					
					populate_combinations();
				}
			});
			
			
		});
		/********************************** ATTRIBUTES VALUES ***********************************/