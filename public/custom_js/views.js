// load all the views
var dt = $('.views-table').DataTable({
	ajax: "load-views",
	"processing": true
});

$('#refresh').on('click', function(){
	dt.ajax.reload();
});

// add view

$('#add_form').on('submit', function(e){
	alert('submitting...');
	e.preventDefault();
});

// update view
$('a.edit-btn').on('click', function(){
	alert('working');
//	var edit_id = $(this).attr('edit-id');
//	
//	alert(edit_id);
});