$(document).bind( "pagebeforechange", function( e, data ) {		
	$("#FormPaidEmployeeListUpdLoad").validate();
    $("#Date").scroller({ 
		preset: 'date', 
		mode: 'clickpick',
		dateOrder:'yymmdd',
		dateFormat: 'yy-mm-dd',
		dayText:'Ngày',
		monthText:'Tháng',
		yearText:'Năm'		
	});
	
});