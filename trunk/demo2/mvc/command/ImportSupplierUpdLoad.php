<?php		
	namespace MVC\Command;	
	class ImportSupplierUpdLoad extends Command{
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
			$OI = $mOI->find($IdOrderImport);
			$Supplier = $mSupplier->find($IdSupplier);
			$Title = $OI->getDatePrint();
			$Navigation = array(
				array("ỨNG DỤNG", "/app"),
				array("NHẬP HÀNG", "/import"),
				array(mb_strtoupper($Supplier->getName(), 'UTF8'), $Supplier->getURLImport())				
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty('Title', $Title);
			$request->setObject('Navigation', $Navigation);
			$request->setObject('OrderImport', $OI);
		}
	}
?>