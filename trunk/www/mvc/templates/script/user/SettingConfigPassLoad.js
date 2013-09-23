/*<![CDATA[*/
$(function () {
	$('#FormSettingConfigPassLoad').jqcrypt({
		keyname: 'cafe123app',
		callback: function(form){ form.submit(); 
		}
	});	
});
/*]]>*/