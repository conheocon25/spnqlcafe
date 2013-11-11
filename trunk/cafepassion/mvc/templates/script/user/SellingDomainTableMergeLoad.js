$(document).ready(function(){
	$.mobile.loadingMessageTextVisible = true;
	$('.Table').live('click', function(){
		var URL = $(".TitleTable").attr('alt');
		var IdTable = $(this).attr('alt');
		URL = URL+"/"+IdTable;		
		$.mobile.changePage( URL, { transition: "slideup"} );
	});	
});
