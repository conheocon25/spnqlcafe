<?php		
	namespace MVC\Command;	
	class PaidSupplierDelLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdPaidSupplier = $request->getProperty("IdPaidSupplier");
			$IdSupplier = $request->getProperty("IdSupplier");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mSupplier = new \MVC\Mapper\Supplier();
			$mPS = new \MVC\Mapper\PaidSupplier();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Supplier = $mSupplier->find($IdSupplier);
			$PS = $mPS->find($IdPaidSupplier);
			$PSs = $mPS->findBy(array($IdSupplier));			
			$Title = mb_strtoupper("CHI PHÍ / ".$Supplier->getName()." / ".$PS->getDatePrint()." / XÓA", 'UTF8');
						
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