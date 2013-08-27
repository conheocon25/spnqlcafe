$(document).on("pageshow", "#normal", function() {	
	$('#FormSignin').jqcrypt({
		keyname:    'cafe123app',
		callback:   function(form){ form.submit(); }
	});
	
	$("#FormSignin").validate();
});
