<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/PaidEmployeeUpdLoad.html");
	$Out = $Viewer->html();
	unset($Viewer);
	echo $Out;
?>
