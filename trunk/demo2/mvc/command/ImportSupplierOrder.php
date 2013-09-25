<?php		
	namespace MVC\Command;	
	class ImportSupplierOrder extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$IdSupplier = $request->getProperty("IdSupplier");
			$IdOrderImport = $request->getProperty("IdOrderImport");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			
			$mSupplier = new \MVC\Mapper\Supplier();
			$mOI = new \MVC\Mapper\OrderImport();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$Supplier = $mSupplier->find($IdSupplier);
			$OI = $mOI->find($IdOrderImport);
			
			$Title = $OI->getDatePrint();
			$Navigation = array(
				array("ỨNG DỤNG", "/app"),
				array("NHẬP HÀNG", "/import"),
				array(mb_strtoupper($Supplier->getName(), 'UTF8'), $Supplier->getURLImport())				
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------															
			$request->setObject('Supplier', $Supplier);
			$request->setObject('OI', $OI);
			
			$request->setProperty('Title', $Title);
			$request->setObject('Navigation', $Navigation);
		}
	}
?>