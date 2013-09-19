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
			$Phone = $request->getProperty('Phone');
			$Type = $request->getProperty('Type');
			$Card = $request->getProperty('Card');
			$Note = $request->getProperty('Note');
			$Address = $request->getProperty('Address');
			$Discount = $request->getProperty('Discount');
			
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
			$Customer->setPhone($Phone);
			$Customer->setType($Type);
			$Customer->setCard($Card);
			$Customer->setNote($Note);
			$Customer->setAddress($Address);
			$Customer->setDiscount($Discount);
			
			$mCustomer->update($Customer);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>
