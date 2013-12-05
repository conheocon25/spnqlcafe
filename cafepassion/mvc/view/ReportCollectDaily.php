<?php	
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/ReportCollectDaily.html");
	echo $Viewer->html();
?>