<?php	
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/ReportCollectGeneral.html");
	echo $Viewer->pdf();
?>
