<?php	
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/SellingDomainTablePrint.html");
	echo $Viewer->custompdf();
?>