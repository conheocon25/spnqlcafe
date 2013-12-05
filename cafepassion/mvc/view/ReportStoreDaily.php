<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/ReportStoreDaily.html");
	echo $Viewer->html();
?>