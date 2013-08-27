<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/SettingCategoryDelLoad.html");
	$Out = $Viewer->html();
	unset($Viewer);
	echo $Out;
?>
