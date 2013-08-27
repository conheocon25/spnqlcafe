$(document).bind( "pagebeforechange", function( e, data ) {	
	var IdEmployee = $(".TitleEmployee").attr('alt');	
	$('.Employee[alt|='+IdEmployee+']').attr('data-theme','a');
});
