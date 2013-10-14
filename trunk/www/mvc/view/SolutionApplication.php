<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/SolutionApplication.html");
	echo $Viewer->html();
?>
