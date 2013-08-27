<?php
	namespace MVC\Command;	
	class App extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$Alias = $request->getProperty('IdApp');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mTermCollect = new \MVC\Mapper\TermCollect();
			$mTermPaid = new \MVC\Mapper\TermPaid();
			$mSupplier = new \MVC\Mapper\Supplier();
			$mDomain = new \MVC\Mapper\Domain();
			$mCustomer = new \MVC\Mapper\Customer();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$TermCollectAll = $mTermCollect->findAll();
			$TermPaidAll = $mTermPaid->findAll();
			$SupplierAll = $mSupplier->findAll();
			$DomainAll = $mDomain->findAll();
			$CustomerAll = $mCustomer->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject("DomainAll", $DomainAll);
			$request->setObject("TermCollectAll", $TermCollectAll);
			$request->setObject("TermPaidAll", $TermPaidAll);
			$request->setObject("SupplierAll", $SupplierAll);
			$request->setObject("CustomerAll", $CustomerAll);
		}
	}
?>