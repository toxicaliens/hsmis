// load all the views
var dt = $('.views-table').DataTable({
	ajax: "load-views"
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
    var form_errors = '#add_errors';
    var success = '#add_success';
    var ps_bar = '.add_ps';
    var modal_div = '#add-view';

    $(ps_bar).slideDown('slow');
	$(form_errors).slideUp('slow');

	$.ajax({
		url: 'add-view',
		type: 'POST',
		data: $(this).serialize(),
		dataType: 'json',
		success: function(data){
			// hide the progress bar
			$(ps_bar).slideUp('slow', function(){
				if(!data.success){
					$(form_errors).slideDown('slow', function(){
						var html = '<button class="close" data-dismiss="alert">&times;</button>';

						for(var key in data.errors){
							var errors = data.errors[key];
							for(var i = 0; i < errors.length; i++){
								html += '<li>'+errors[i]+'</li>';
							}
						}

						$(form_errors+' > ul').html(html);
					});
				}else{
					$(form_errors).hide();
					$(success).slideDown('slow', function(){
						setTimeout(function(){
                            closeModal(success, modal_div)
                        }, 3000);
					});
				}
			});
		}
	});
});

// edit view
$('table').on('click', 'td', function() {
	edit_id = $(this).children('a').attr('edit-id');
    $('#edit_id, #delete_id').val(edit_id);
	var data = { edit_id: edit_id };

	if(edit_id != ''){
		$.ajax({
			url: 'get-view/'+edit_id,
			type: 'GET',
			dataType: 'json',
			success: function(data){
				$('#view_name').val(data['view_name']);
				$('#url').val(data['view_url']);
				$('#ed_parent_views').val(data['parent_id']);
			}
		});
	}
});

$('form#edit_form').on('submit', function(e){
    e.preventDefault();
    var form_errors = '#edit_errors';
    var success = '#edit_success';
    var ps_bar = '.edit_ps';
    var modal_div = '#edit-view';

    $(ps_bar).slideDown('slow');
    $(form_errors).slideUp('slow');

    $.ajax({
        url: 'update-view',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(data){
            // hide the progress bar
            $(ps_bar).slideUp('slow', function(){
                if(!data.success){
                    $(form_errors).slideDown('slow', function(){
                        var html = '<button class="close" data-dismiss="alert">&times;</button>';

                        for(var key in data.errors){
                            var errors = data.errors[key];
                            for(var i = 0; i < errors.length; i++){
                                html += '<li>'+errors[i]+'</li>';
                            }
                        }
                        $(form_errors+' > ul').html(html);
                    });
                }else{
                    $(form_errors).hide();
                    $(success).slideDown('slow', function(){
                        setTimeout(function(){
                            closeModal(success, modal_div);
                        }, 3000);
                    });
                }
            });
        }
    });
});
// end edit view

// delete view
$('form#delete_form').on('submit', function(e){
    e.preventDefault();
    var success = '#del_success';
    var ps_bar = '.edit_ps';
    var modal_div = '#del-view';
    $(ps_bar).slideDown('slow');

    $.ajax({
        url: 'delete-view',
        type: 'DELETE',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(data){
            // hide the progress bar
            $(ps_bar).slideUp('slow', function(){
                if(data.success){
                    $(success).slideDown('slow', function(){
                        setTimeout(function(){
                            closeModal(success, modal_div);
                        }, 3000);
                    });
                }
            });
        }
    });
});
//end delete

// bulk delete

// end bulk delete

function closeModal(success, modal_div){
	// close the modal
	$(modal_div).modal('hide');

	// reload the datagrid
	dt.ajax.reload();

	// empty the modal form fields
	$('form input[type="text"], select').val('');
	$(success).hide();

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
			$('#parent_views, #ed_parent_views').html(html);
		}
	});
}