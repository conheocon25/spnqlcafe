<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/Register.html");
	echo $Viewer->html(null, null);
?>