$(document).ready(function(){	
	$('.Plus').click(function(){
		var URL = $(".Table").attr('alt');
		var IdCourse = $(this).attr('alt');
		var Count = $(this.parentNode.parentNode.childNodes[7]).html();
						
		URL = URL+"/"+IdCourse+"/plus";
		
		$.ajax({
			type: "POST", 
			async: false,
			url: URL,
			dataType: 'json',
			success: function(data){
				Count = data.Count;				
			}
		});		
		$(this.parentNode.parentNode.childNodes[7]).html( Count);
		
	});	
	
	$('.Minus').live('click', function(){
		var URL = $(".Table").attr('alt');
		var IdCourse = $(this).attr('alt');
		var Count = $(this.parentNode.parentNode.childNodes[7]).html();
						
		URL = URL+"/"+IdCourse+"/minus";
		
		$.ajax({
			type: "POST", 
			async: false,
			url: URL,
			dataType: 'json',
			success: function(data){
				Count = data.Count;				
			}
		});		
		$(this.parentNode.parentNode.childNodes[7]).html( Count);
	});	
	
});
