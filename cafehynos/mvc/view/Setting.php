<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/Setting.html");
	$Out = $Viewer->html();
	unset($Viewer);
	echo $Out;
?>
