$(document).bind( "pagebeforechange", function( e, data ) {							 
	var IdDomain = $(".TitleDomain").attr('alt');	
	$('.Domain[alt|='+IdDomain+']').attr('data-theme','a');
});
