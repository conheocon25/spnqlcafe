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
									
			$Title = $PS->getDatePrint();
			$Navigation = array(
				array("ỨNG DỤNG", "/app"),
				array("KHOẢN CHI", "/paid"),
				array("NHÀ CUNG CẤP", "/paid/supplier"),
				array(mb_strtoupper($Supplier->getName(), 'UTF8'), $Supplier->getURLPaid())
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty('Title', $Title);
			$request->setObject('Navigation', $Navigation);			
			$request->setObject('PaidSupplier', $PS);
		}
	}
?>