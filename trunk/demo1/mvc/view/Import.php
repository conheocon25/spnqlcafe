<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/Import.html");
	$Out = $Viewer->html();
	unset($Viewer);
	echo $Out;
?>
