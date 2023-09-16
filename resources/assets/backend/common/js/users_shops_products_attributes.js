/************************************** ATTRIBUTES **************************************/

		$('body').on("keypress", '#attributes input', function(e){
			if (event.keyCode == 13) {
				e.preventDefault();
			}
		});
		
		$('#attributes #attributes-inputs #sortable-attributes').sortable({
			connectWith: "#sortable-attributes",
			items: "> li.parent",
		});
		$('#attributes #attributes-inputs #sortable-attributes').on('sortupdate',function(){
			var order = $(this).sortable('toArray', {attribute: 'data-id'});
			$.ajax({
				type: 'PUT',
				url: attribute_position,
				dataType: "html",
				data: {order: order},
				beforeSend: function(xhr) {
					xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
				}
			});
		});
		$('#attributes div[role="button-attributes"]').on("click", function(){
			var ul = $('#attributes #attributes-inputs #sortable-attributes');
			var tpl = $('<li class="parent ui-state-default">' +
				'<div class="row">' +
					'<div class="process-attributes"><div role="button-save-attributes" class="btn btn-success">'+sSave+'</div></div>' +
					'<div class="col-4 col-xl-4 col-lg-12 col-md-12 col-sm-12">' +
						'<div class="form-group"><input placeholder="name" class="form-control" name="attributes_name" type="text"></div>'+
					'</div>' +
					'<div class="col-8 col-xl-8 col-lg-12 col-md-12 col-sm-12">' +
						'<div id="attributes-values" class="panel panel-default">' +
							'<div class="panel-heading">' +
								'<div class="pull-right">' +

								'</div>' +
							'</div>' +
							'<div class="panel-body">' +
								'<div class="row">' +
									'<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">' +
										'<div id="attributes-values-inputs">' +
											'<ul id="sortable-attributes-values">' +
											'</ul>' +
										'</div>' +
									'</div>' +
								'</div>' +
							'</div>' +
						'</div>' +
					'</div>' +
				'</div>' +
			'</li>');								
			tpl.appendTo(ul);
		});
		$('body').on("click", '#attributes #attributes-inputs #sortable-attributes .process-attributes div[role="button-save-attributes"]', function(){
			
			container = $(this).parent().parent().parent();
			attributes_name = container.find('input[name="attributes_name"]');
			
			id = container.data('id') ? container.data('id') : 0;

			if(attributes_name.val())
			{
				$.ajax({
					type: 'POST',
					url: attribute_create,
					dataType: "html",
					data: {attributes_id: id, attributes_name: attributes_name.val()},
					beforeSend: function(xhr) 
					{
						xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
					},
					success: function(data) 
					{
						data = JSON.parse(data);
						container.find('.form-group').removeClass('has-error');
						//console.log(container);
						
						container.find('.process-attributes').html('<div role="button-save-attributes" class="btn btn-success">'+sSave+'</div><div role="button-delete-attributes" class="btn btn-danger">'+sDelete+'</div>');
						
						container.attr('data-id', data.message.id);
						
						container.find('#attributes-values .panel-heading .pull-right').html('<div role="button-attributes-values" class="btn btn-primary"><i class="icmn-plus"></i></div>');
						container.find('#attributes-values #attributes-values-inputs #sortable-attributes-values').attr('data-id', data.message.id);
						
						$('#attributes #attributes-inputs #sortable-attributes').trigger('sortupdate');
						
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
			else
			{
				$(this).parent().parent().find('.form-group').addClass('has-error');
			}
		});
		$('body').on("click", '#attributes #attributes-inputs .process-attributes div[role="button-delete-attributes"]', function(){
			container = $(this).parent().parent().parent();
			id = container.data('id') ? container.data('id') : 0;
			$.ajax({
				type: 'DELETE',
				url: attribute_delete,
				dataType: "html",
				data: {id: id},
				beforeSend: function(xhr) {
					xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
				},
				success: function(data) {
					data = JSON.parse(data);
					container.fadeOut(500, function(){ 
						$(this).remove();
						$('#attributes #attributes-inputs #sortable-attributes').trigger('sortupdate');
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
		/************************************** ATTRIBUTES **************************************/