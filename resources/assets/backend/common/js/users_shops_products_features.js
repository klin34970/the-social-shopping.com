/*************************************** FEATURES ***************************************/

		$('body').on("keypress", '#features input', function(e){
			if (event.keyCode == 13) {
				e.preventDefault();
			}
		});
		
		$('#features #sortable').sortable({
			connectWith: "#sortable",
		});
		$('#features #sortable').on('sortupdate',function(){
			var order = $(this).sortable('toArray', {attribute: 'data-id'});
			$.ajax({
				type: 'PUT',
				url: feature_position,
				dataType: "html",
				data: {order: order},
				beforeSend: function(xhr) {
					xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
				},
			});
		});
		$('#features div[role="button"]').on("click", function(){
			var ul = $('#features ul');
			var tpl = $('<li class="ui-state-default">' +
				'<div class="row">' +
					'<div class="process"><div role="button-save" class="btn btn-success">'+sSave+'</div></div>' +
					'<div class="col-4 col-xl-4 col-lg-12 col-md-12 col-sm-12">' +
						'<div class="form-group"><input placeholder="title" class="form-control" name="features_title" type="text"></div>'+
					'</div>' +
					'<div class="col-8 col-xl-8 col-lg-12 col-md-12 col-sm-12">' +
						'<div class="form-group"><input placeholder="description" name="features_description" type="text" class="form-control"></div>' +
					'</div>' +
				'</div>' +
			'</li>');								
			tpl.appendTo(ul);
		});
		$('body').on("click", '#features #features-inputs div[role="button-save"]', function(){
			
			container = $(this).parent().parent().parent();
			features_title = container.find('input[name="features_title"]');
			features_description = container.find('input[name="features_description"]');
			
			id = container.data('id') ? container.data('id') : 0;
			if(features_title.val() && features_description.val())
			{
				$.ajax({
					type: 'POST',
					url: feature_create,
					dataType: "html",
					data: {features_id: id, features_title: features_title.val(), features_description: features_description.val()},
					beforeSend: function(xhr) 
					{
						xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
					},
					success: function(data) 
					{
						data = JSON.parse(data);
						container.find('.form-group').removeClass('has-error');
						container.find('.process').html('<div role="button-save" class="btn btn-success">'+sSave+'</div><div role="button-delete" class="btn btn-danger">'+sDelete+'</div>');
						container.attr('data-id', data.message.id);
						$('#features #sortable').trigger('sortupdate');
						
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
		$('body').on("click", '#features #features-inputs div[role="button-delete"]', function(){
			container = $(this).parent().parent().parent();
			id = container.data('id') ? container.data('id') : 0;
			$.ajax({
				type: 'DELETE',
				url: feature_delete,
				dataType: "html",
				data: {id: id},
				beforeSend: function(xhr) {
					xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
				},
				success: function(data) {
					data = JSON.parse(data);
					container.fadeOut(500, function(){ 
						$(this).remove();
						$('#features #sortable').trigger('sortupdate');
						$.notify({
							message: data.message
						},{
							type: 'success'
						});
					});
				}
			});
			
			
		});
		/*************************************** FEATURES ***************************************/