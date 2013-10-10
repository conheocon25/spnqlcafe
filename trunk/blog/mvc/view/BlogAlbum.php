<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/BlogAlbum.html");
	echo $Viewer->html();
?>
