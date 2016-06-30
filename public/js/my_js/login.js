$('#create_acc').on('click', function(){
	$('#login').slideUp('slow', function(){
		$('#register-form').slideDown('slow');
	});
});

$('#login-btn').on('click', function(){
		$('#register-form').slideUp('slow', function(){
			$('#login').slideDown('slow');
		});
});