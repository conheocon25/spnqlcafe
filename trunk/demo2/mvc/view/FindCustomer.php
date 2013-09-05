<?php
	require_once("mvc/base/ViewHelper.php");			
	$request = VH::getRequest();
	$IdCustomer = $request->getProperty('IdCustomer');
	$CustomerName = $request->getProperty('CustomerName');
	$Discount = $request->getProperty('Discount');
	$Data = array('id'=>$IdCustomer,
		'name'=> $CustomerName,
		'discount'=> $Discount
	);		
	echo json_encode($Data);
?>
