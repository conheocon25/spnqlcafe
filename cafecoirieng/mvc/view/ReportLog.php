<?php	
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/ReportLog.html");
	echo $Viewer->pdf();
?>
