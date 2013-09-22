$(document).bind( "pagebeforechange", function( e, data ) {	
	$("#FormImportSupplierInsLoad").validate();
	$("#Date").scroller({ 
		preset: 'date', 
		mode: 'clickpick',
		dateOrder:'yymmdd',
		dateFormat: 'yy-mm-dd',
		dayText:'Ngày',
		monthText:'Tháng',
		yearText:'Năm'		
	});
	$('#Date').scroller('setDate', new Date(), true);
});
