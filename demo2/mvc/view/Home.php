<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/Home.html");
	$Out = $Viewer->html();
	unset($Viewer);
	echo $Out;
?>
