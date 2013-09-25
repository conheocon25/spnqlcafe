<?php		
	namespace MVC\Command;	
	class CollectCustomerDelLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdCollect = $request->getProperty("IdCollect");
			$IdCustomer = $request->getProperty("IdCustomer");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mCustomer = new \MVC\Mapper\Customer();
			$mCC = new \MVC\Mapper\CollectCustomer();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Customer = $mCustomer->find($IdCustomer);
			$CC = $mCC->find($IdCollect);
			
			$Title = $CC->getDatePrint();
			$Navigation = array(
				array("ỨNG DỤNG", "/app"),
				array("KHOẢN THU", "/collect"),
				array("KHÁCH HÀNG", "/collect/customer"),
				array(mb_strtoupper($Customer->getName(), 'UTF8'), $Customer->getURLCollect())
			);
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty('Title', $Title);			
			$request->setObject('Navigation', $Navigation);
			$request->setObject('CollectCustomer', $CC);
		}
	}
?>