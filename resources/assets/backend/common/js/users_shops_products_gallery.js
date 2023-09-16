/*************************************** GALLERY ***************************************/
	if($('#upload').length)
	{
		//$('.dropify').dropify();
		
		$('#drop a').click(function(){
			// Simulate a click on the file input button
			// to show the file browser dialog
			$(this).parent().find('input').click();
		});

		$('#upload').fileupload({
			
			dropZone: $('#drop'),
			url: gallery_create,
			dataType: 'html',
			paramName: 'file',
			singleFileUploads: true,
			sequentialUploads: true,

			beforeSend: function(xhr, data) {
				xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
			},
			
			add: function (e, data) {

				var tpl = $('<li class="ui-state-default working"><input type="text" value="0" data-width="48" data-height="48"'+
					' data-fgColor="#1fb2fe" data-readOnly="1" data-bgColor="#fff" /><p></p><span></span></li>');

				// Append the file name and file size
				tpl.find('p').text(data.files[0].name).append('<i>' + formatFileSize(data.files[0].size) + '</i>');
				
				// Add the HTML to the UL element
				var ul = $('#upload ul');
				data.context = tpl.appendTo(ul);

				// Initialize the knob plugin
				tpl.find('input').knob();
				
				// Automatically upload the file once it is added to the queue
				var jqXHR = data.submit();
			},
			
			progress: function(e, data){

				// Calculate the completion percentage of the upload
				var progress = parseInt(data.loaded / data.total * 100, 10);

				// Update the hidden input field and trigger a change
				// so that the jQuery knob plugin knows to update the dial
				data.context.find('input').val(progress).change();

				if(progress == 100){
					data.context.removeClass('working');
				}
			},

			fail:function(e, data){
				// Something has gone wrong!
				data.context.addClass('error');
				error = JSON.parse(data.jqXHR.responseText).error;
				data.context.find('p').append('<small>' + error + '</small>');
				data.context.fadeOut(15000, function(){ 
					$(this).remove();
				});
			},
			
			done:function(e, data){
				message = JSON.parse(data.jqXHR.responseText).message;
				//console.log(message);
				data.context.append('<div role="button" class="btn btn-danger">'+sDelete+'</div>');
				data.context.attr('data-id', message.id);
				data.context.find('canvas').remove();
				data.context.prepend('<img src="'+message.url+'">');
			},
				
		});

		$(document).on('drop dragover', function (e) {
			e.preventDefault();
		});

		$('#upload #sortable').sortable({
			connectWith: "#sortable",
		});
		$('#upload #sortable').on('sortupdate',function(){
			var order = $(this).sortable('toArray', {attribute: 'data-id'});
			$.ajax({
				type: 'PUT',
				url: gallery_position,
				dataType: "html",
				data: {order: order},
				beforeSend: function(xhr) {
					xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
				},
			});
		});

		$('body').on("click", '#upload div[role="button"]', function(){
			container = $(this).parent();
			id = container.data('id');
			//console.log(container);
			$.ajax({
				type: 'DELETE',
				url: gallery_delete,
				dataType: "html",
				data: {id: id},
				beforeSend: function(xhr) {
					xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
				},
				success: function(data) {
					data = JSON.parse(data);
					container.fadeOut(500, function(){
						$(this).remove();
						$('#upload #sortable').trigger('sortupdate');
						$.notify({
							message: data.message
						},{
							type: 'success'
						});
					});
					
				}
			});
		});
	}

		function formatFileSize(bytes) {
			if (typeof bytes !== 'number') {
				return '';
			}

			if (bytes >= 1000000000) {
				return (bytes / 1000000000).toFixed(2) + ' GB';
			}

			if (bytes >= 1000000) {
				return (bytes / 1000000).toFixed(2) + ' MB';
			}

			return (bytes / 1000).toFixed(2) + ' KB';
		}
		/*************************************** GALLERY ***************************************/