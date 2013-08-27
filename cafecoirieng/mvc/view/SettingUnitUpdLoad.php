<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/SettingUnitUpdLoad.html");
	$Out = $Viewer->html();
	unset($Viewer);
	echo $Out;
?>
