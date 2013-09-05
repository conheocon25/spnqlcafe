$(document).bind( "pagebeforechange", function( e, data ) {
		
	$("#DateStart_Supplier").scroller({
		preset: 'date', 
		mode: 'clickpick',
		dateOrder:'yymmdd',
		dateFormat: 'yy-mm-dd',
		dayText:'Ngày',
		monthText:'Tháng',
		yearText:'Năm'		
	});	
	$('#DateStart_Supplier').scroller('setDate', new Date(), true);
	
	$("#DateEnd_Supplier").scroller({
		preset: 'date', 
		mode: 'clickpick',
		dateOrder:'yymmdd',
		dateFormat: 'yy-mm-dd',
		dayText:'Ngày',
		monthText:'Tháng',
		yearText:'Năm'		
	});
	$('#DateEnd_Supplier').scroller('setDate', new Date(), true);
	
	$("#DateStart_Selling").scroller({
		preset: 'date', 
		mode: 'clickpick',
		dateOrder:'yymmdd',
		dateFormat: 'yy-mm-dd',
		dayText:'Ngày',
		monthText:'Tháng',
		yearText:'Năm'		
	});
	$('#DateStart_Selling').scroller('setDate', new Date(), true);	
	$("#DateEnd_Selling").scroller({
		preset: 'date', 
		mode: 'clickpick',
		dateOrder:'yymmdd',
		dateFormat: 'yy-mm-dd',
		dayText:'Ngày',
		monthText:'Tháng',
		yearText:'Năm'		
	});
	$('#DateEnd_Selling').scroller('setDate', new Date(), true);
	
	$("#DateStart_Other").scroller({
		preset: 'date', 
		mode: 'clickpick',
		dateOrder:'yymmdd',
		dateFormat: 'yy-mm-dd',
		dayText:'Ngày',
		monthText:'Tháng',
		yearText:'Năm'		
	});
	$('#DateStart_Other').scroller('setDate', new Date(), true);
	$("#DateEnd_Other").scroller({
		preset: 'date', 
		mode: 'clickpick',
		dateOrder:'yymmdd',
		dateFormat: 'yy-mm-dd',
		dayText:'Ngày',
		monthText:'Tháng',
		yearText:'Năm'		
	});
	$('#DateEnd_Other').scroller('setDate', new Date(), true);
	
	$("#DateStart_Employee").scroller({
		preset: 'date', 
		mode: 'clickpick',
		dateOrder:'yymmdd',
		dateFormat: 'yy-mm-dd',
		dayText:'Ngày',
		monthText:'Tháng',
		yearText:'Năm'		
	});
	$('#DateStart_Employee').scroller('setDate', new Date(), true);
	$("#DateEnd_Employee").scroller({
		preset: 'date', 
		mode: 'clickpick',
		dateOrder:'yymmdd',
		dateFormat: 'yy-mm-dd',
		dayText:'Ngày',
		monthText:'Tháng',
		yearText:'Năm'		
	});
	$('#DateEnd_Employee').scroller('setDate', new Date(), true);
	
	$("#DateGeneral").scroller({
		preset: 'date', 
		mode: 'clickpick',
		dateOrder:'yymmdd',
		dateFormat: 'yy-mm-dd',
		dayText:'Ngày',
		monthText:'Tháng',
		yearText:'Năm'		
	});
	$('#DateGeneral').scroller('setDate', new Date(), true);
	
});
