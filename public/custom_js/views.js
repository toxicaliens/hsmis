// load all the views
var dt = $('.views-table').DataTable({
	ajax: "load-views",
	"processing": true
});

// retrieve all parent views on document load
refreshParentViews();

// refresh the views datatable
$('#refresh').on('click', function(){
	dt.ajax.reload();
});

// add view
$('form#add_form').on('submit', function(e){
	e.preventDefault();
	$('.add_ps').slideDown('slow');
	$('#add_errors').slideUp('slow');
	
	$.ajax({
		url: 'add-view',
		type: 'POST',
		data: $(this).serialize(),
		dataType: 'json',
		success: function(data){				
			// hide the progress bar
			$('.add_ps').slideUp('slow', function(){
				if(!data.success){
					$('#add_errors').slideDown('slow', function(){
						var html = '<button class="close" data-dismiss="alert">&times;</button>';
						
						for(var key in data.errors){
							html += '<li>'+key.toUpperCase()+'<ul>';
							
							var errors = data.errors[key];
							for(var i = 0; i < errors.length; i++){
								html += '<li>'+errors[i]+'</li>';
							}
						}
						
						$('#add_errors > ol').html(html+'<ul/>');
					});
				}else{
					$('#add_errors').hide();
					$('#add_success').slideDown('slow', function(){
						setTimeout(closeModal, 3000);							
					});					
				}
			});
		}
	});
});

// edit view
$('table').on('click', 'td', function() {
	edit_id = $(this).children('a').attr('edit-id');
	
	if(edit_id != ''){
		$.ajax({
			url: ''
		});
	}
});

function closeModal(){
	// close the modal
	$('#add-view').modal('toggle');
	
	// reload the datagrid
	dt.ajax.reload();
	
	// empty the modal form fields
	$('form input[type="text"], select').val('');
	$('#add_success').hide();
	
	refreshParentViews();
}

function refreshParentViews(){
	var html = '<option value="">--Choose Parent--</option>';
	$.ajax({
		url: 'parent-views',
		dataType: 'json',
		success: function(data){
			for(var i = 0; i < data.length; i++){
				html += '<option value="'+data[i].id+'">'+data[i].view_name+'</option>';
			}
			$('#parent_views').html(html);
		}
	});
}