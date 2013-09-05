<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/SettingUnitDelLoad.html");
	$Out = $Viewer->html();
	unset($Viewer);
	echo $Out;
?>
