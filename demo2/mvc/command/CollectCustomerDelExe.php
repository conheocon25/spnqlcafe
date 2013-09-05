<?php
	namespace MVC\Command;
	class CollectCustomerDelExe extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCollect = $request->getProperty('IdCollect');
											
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCC = new \MVC\Mapper\CollectCustomer();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$mCC->delete(array($IdCollect));
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>