<?php		
	namespace MVC\Command;	
	class PaidSupplierUpdLoad extends Command{
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
			$IdPaidSupplier = $request->getProperty("IdPaidSupplier");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------					
			$mPS = new \MVC\Mapper\PaidSupplier();
			$mSupplier = new \MVC\Mapper\Supplier();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Supplier = $mSupplier->find($IdSupplier);
			$PS = $mPS->find($IdPaidSupplier);
			$PSs = $mPS->findBy(array($IdSupplier));			
			$Title = mb_strtoupper("CHI PHÍ / ".$Supplier->getName()."/".$PS->getDatePrint()." / CẬP NHẬT", 'UTF8');
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty('Title', $Title);
			$request->setProperty('URLHeader', $Supplier->getURLPaid());
			
			$request->setObject('PaidSupplier', $PS);
			$request->setObject('PaidSuppliers1', $PSs);
		}
	}
?>