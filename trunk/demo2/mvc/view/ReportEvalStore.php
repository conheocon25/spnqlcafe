<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/ReportEvalStore.html");
	$Out = $Viewer->html();
	unset($Viewer);
	echo $Out;
?>
