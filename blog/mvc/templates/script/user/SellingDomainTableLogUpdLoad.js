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

$(document).ready(function(){
	$.mobile.loadingMessageTextVisible = true;
	
	$('#Barcode').keypress(function(e) {
		if(e.keyCode==13){
			if($(this).val()!=''){
				$.mobile.showPageLoadingMsg();			
				$.ajax({
						type: "POST", 
						async: false,
						url: "http://k3d.123app.net/customer/" + $(this).val(),
						dataType: 'json',			
						success: function(data){						
							if(data.id != "") {
								$('#DiscountPercent').val(data.discount);								
								$('#IdCustomer option:selected').removeAttr('selected');
								$("#IdCustomer option[value='"+data.id+"']").attr('selected', 'selected');		
								$("#IdCustomer").change();								
							}
							$.mobile.hidePageLoadingMsg();
						}
				});
				$(this).val("");
				$(this).focus();
			}
		}
	});
	
	
});