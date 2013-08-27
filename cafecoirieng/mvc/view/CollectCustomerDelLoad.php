<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/CollectCustomerDelLoad.html");
	$Out = $Viewer->html();
	unset($Viewer);
	echo $Out;
?>
