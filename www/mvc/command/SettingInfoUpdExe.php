<?php
	namespace MVC\Command;	
	class SettingInfoUpdExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdKey = $request->getProperty('IdKey');
			$Email = $request->getProperty('Email');
			$Phone = $request->getProperty('Phone');
			$Address = $request->getProperty('Address');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCustomer = new \MVC\Mapper\Customer();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$Customer = $mCustomer->findByKey($IdKey);
			$Customer->setEmail($Email);
			$Customer->setPhone($Phone);
			$Customer->setAddress($Address);
			
			$mCustomer->update($Customer);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			
			return self::statuses('CMD_OK');
		}
	}
?>