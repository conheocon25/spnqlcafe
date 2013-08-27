<?php		
	namespace MVC\Command;	
	class CollectCustomerUpdLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdCustomer = $request->getProperty("IdCustomer");
			$IdCollect = $request->getProperty("IdCollect");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------					
			$mCC = new \MVC\Mapper\CollectCustomer();
			$mCustomer = new \MVC\Mapper\Customer();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Customer = $mCustomer->find($IdCustomer);
			$CC = $mCC->find($IdCollect);			
			$Title = mb_strtoupper("KHÁCH HÀNG / ".$Customer->getName()."/".$CC->getDatePrint()." / CẬP NHẬT", 'UTF8');
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty('Title', $Title);
			$request->setProperty('URLHeader', $Customer->getURLCollect());
			
			$request->setObject('CollectCustomer', $CC);
		}
	}
?>