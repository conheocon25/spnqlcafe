<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/SettingDomainDelLoad.html");
	$Out = $Viewer->html();
	unset($Viewer);
	echo $Out;
?>