<?php	
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/ReportImportDaily.html");
	echo $Viewer->html();
?>
