<?php	
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/ReportResource.html");
	echo $Viewer->pdf();
?>
