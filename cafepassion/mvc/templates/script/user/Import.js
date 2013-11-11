$(document).ready(function(){
	$.mobile.loadingMessageTextVisible = true;
	$('.more').live('click', function(){
		var IdList = "#" + $(this).attr('alt');						
		$(IdList).append('<li><a href="#"> Thử nghiệm</a></li>');
								
		$(IdList).listview("refresh");

		//var URL = $(".Table").attr('alt');
		//var IdCourse = $(this).attr('alt');
		//var Count = $(this).find('.ui-li-count').html();
						
		//URL = URL+"/"+IdCourse+"/plus";
		//$.mobile.showPageLoadingMsg();
		//$.ajax({
		//	type: "POST", 
		//	async: false,
		//	url: URL,
		//	dataType: 'json',			
		//	success: function(data){
		//		Count = data.Count;
		//		$.mobile.hidePageLoadingMsg();
		//	}
		//});
		//$(this).find('.ui-li-count').html( Count);
	});	
	
});