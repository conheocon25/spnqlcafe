$(document).bind( "pagebeforechange", function( e, data ) {							 
	
	$("#DateTime").scroller({
		preset: 'datetime', 
		mode: 'clickpick',
		ampmText:'Buổi',
		dateOrder:'yymmddHHii',
		dateFormat: 'yy-mm-dd',
		timeFormat: 'HH:ii:ss',
		dayText:'Ngày',
		monthText:'Tháng',
		yearText:'Năm',
		hourText:'Giờ',
		minuteText:'Phút',
		secondText:'Giây'	
	});
	$("#DateTimeEnd").scroller({
		preset: 'datetime', 
		mode: 'clickpick',
		ampmText:'Buổi',
		dateOrder:'yymmddHHii',
		dateFormat: 'yy-mm-dd',
		timeFormat: 'HH:ii:ss',
		dayText:'Ngày',
		monthText:'Tháng',
		yearText:'Năm',
		hourText:'Giờ',
		minuteText:'Phút',
		secondText:'Giây'
	});
	
});
