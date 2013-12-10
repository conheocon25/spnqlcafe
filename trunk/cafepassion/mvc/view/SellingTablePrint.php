<?php	
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/SellingTablePrint.html");
	echo $Viewer->custompdf();
?>