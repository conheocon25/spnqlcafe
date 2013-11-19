<?php	
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/ReportCustomerDetail.html");
	echo $Viewer->pdf();
?>
