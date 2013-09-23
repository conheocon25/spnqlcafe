<?php
	namespace MVC\Command;	
	class SettingCustomerUpdExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$IdCustomer = $request->getProperty('IdCustomer');
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
			
			$Customer = $mCustomer->find($IdCustomer);
			
			$Customer->setName($Name);
			$Customer->setEmail($Email);
			$Customer->setPhone($Phone);
			$Customer->setType($Type);
			$Customer->setAddress($Address);
			$Customer->setKey($Key);
			$Customer->reKey();
			
			$mCustomer->update($Customer);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>
