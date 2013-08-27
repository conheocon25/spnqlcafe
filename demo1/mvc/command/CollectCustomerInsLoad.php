<?php		
	namespace MVC\Command;	
	class CollectCustomerInsLoad extends Command{
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
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCustomer = new \MVC\Mapper\Customer();
			$mCC = new \MVC\Mapper\CollectCustomer();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Customer = $mCustomer->find($IdCustomer);			
			$Title = mb_strtoupper("KHÁCH HÀNG / ".$Customer->getName()." / KHOẢN THU / THÊM", 'UTF8');
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty('Title', $Title);
			$request->setProperty('URLHeader', $Customer->getURLCollect() );
			$request->setObject('Customer', $Customer);
		}
	}
?>