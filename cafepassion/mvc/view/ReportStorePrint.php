<?php	
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/ReportStorePrint.html");
	echo $Viewer->pdf();
?>
