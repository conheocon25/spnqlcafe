<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/PaidPayRoll.html");
	$Out = $Viewer->html();
	unset($Viewer);
	echo $Out;
?>
