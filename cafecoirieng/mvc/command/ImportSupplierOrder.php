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
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty('URLHeader', $Supplier->getURLImport());
			$request->setObject('Supplier', $Supplier);
			$request->setObject('OI', $OI);
		}
	}
?>