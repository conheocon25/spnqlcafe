<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/SettingCategoryCourseRecipeDelLoad.html");
	$Out = $Viewer->html();
	unset($Viewer);
	echo $Out;
?>
