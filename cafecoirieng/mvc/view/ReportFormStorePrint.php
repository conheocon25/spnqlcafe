<?php	
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/ReportFormStorePrint.html");
	echo $Viewer->pdfBD();
?>
