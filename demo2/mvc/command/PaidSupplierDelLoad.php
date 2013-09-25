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
			$request->setObject('PaidSuppliers1', $PSs);
			
		}
	}
?>