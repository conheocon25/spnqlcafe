//-----------------------------------------------------------------------------------
//LOCATION CHANGE
$('#URLLocationChange').click(function(){								
	$("#LocationName").html($("#IdProvince").val());								
	
	var URL = "/location/change";
	$.ajax({
		type: "POST",
		data: {Name:$("#IdProvince").val()},
		url: URL,
		success: function(msg){
			
		}
	});				
	$('#LocationChange').modal('hide');
});										