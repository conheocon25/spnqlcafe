<?php
	namespace MVC\Command;	
	class SettingCustomerInsExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$Name = $request->getProperty('Name');
			$Email = $request->getProperty('Email');
			$Phone = $request->getProperty('Phone');
			$Type = $request->getProperty('Type');			
			$Address = $request->getProperty('Address');
			$Key = $request->getProperty('Key');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCustomer = new \MVC\Mapper\Customer();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Name)||$Name=="") return self::statuses('CMD_OK');
				
			$Customer = new \MVC\Domain\Customer(
				null,
				$Name,
				$Email,
				$Phone,
				$Type,
				$Address,
				$Key
			);
			$Customer->reKey();
			$mCustomer->insert($Customer);
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>
