$(document).ready(function(){	
	$('.Plus').click(function(){
		var URL = $(".Table").attr('alt');
		var IdCourse = $(this).attr('alt');
		var Count = $(this.parentNode.parentNode.childNodes[9]).html();
		var Value = $(this.parentNode.parentNode.childNodes[13]).html();
				
		URL = URL+"/"+IdCourse+"/plus";
		
		$.ajax({
			type: "POST", 
			async: false,
			url: URL,
			dataType: 'json',
			success: function(data){
				Count = data.Count;
				Value = data.Value;
			}
		});		
		$(this.parentNode.parentNode.childNodes[9]).html( Count );
		$(this.parentNode.parentNode.childNodes[13]).html( Value );
		
	});	
	
	$('.Minus').live('click', function(){
		var URL = $(".Table").attr('alt');
		var IdCourse = $(this).attr('alt');
		var Count = $(this.parentNode.parentNode.childNodes[9]).html();
		var Value = $(this.parentNode.parentNode.childNodes[13]).html();
		
		URL = URL+"/"+IdCourse+"/minus";
		
		$.ajax({
			type: "POST", 
			async: false,
			url: URL,
			dataType: 'json',
			success: function(data){
				Count = data.Count;
				Value = data.Value;
			}
		});		
		$(this.parentNode.parentNode.childNodes[9]).html( Count);
		$(this.parentNode.parentNode.childNodes[13]).html( Value );
	});	
	
});
