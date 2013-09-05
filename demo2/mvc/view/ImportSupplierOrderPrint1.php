<?php	
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/ImportSupplierOrderPrint1.html");	
	$Out = $Viewer->pdfBD();
	unset($Viewer);
	echo $Out;
?>
