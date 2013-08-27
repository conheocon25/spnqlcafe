$(document).bind( "pagebeforechange", function( e, data ) {	
	var IdSupplier = $(".TitleSupplier").attr('alt');	
	$('.Supplier[alt|='+IdSupplier+']').attr('data-theme','a');
});
