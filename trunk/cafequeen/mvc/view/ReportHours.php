<?php	
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/ReportHours.html");
	echo $Viewer->pdf();
?>
