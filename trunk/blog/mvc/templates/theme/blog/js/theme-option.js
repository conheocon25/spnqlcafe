$(document).ready(function() {


$('#layout').change(function () { 
	var b = $(this).children(":selected").val();
	if (b == 'boxed') {
		$('head').append('<link id="boxed_layout" rel="stylesheet" href="/mvc/templates/theme/blog/css/style-boxed.css" type="text/css" />')
	}	
	else if (b == 'stretched') {
		$("#boxed_layout").remove();
	}	
});	


 $("select#colors option").click(function(){
  var color = $(this).attr('value');
  if ($("#css_color_style").length > 0){
	  $("#css_color_style").remove();
  }
  $("head").append("<link>");
  css = $("head").children(":last");
  css.attr({
    rel:  "stylesheet",
    type: "text/css",
    id: "css_color_style",
    href: "/mvc/templates/theme/blog/css/colors/color-" + color + ".css"
  });
 })

 $("#panel a.open").click(function(){
  var margin_left = $("#panel").css("margin-left");
  if (margin_left == "-170px"){
  $("#panel").animate({marginLeft: "0px"});
 }
 else{
  $("#panel").animate({marginLeft: "-170px"});
 }

 })

}); 