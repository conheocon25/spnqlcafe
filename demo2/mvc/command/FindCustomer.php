<?php
	namespace MVC\Command;	
	class FindCustomer extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCard = $request->getProperty('IdCard');
			
				
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			
			$mCus = new \MVC\Mapper\Customer();
			if (isset($IdCard)) {
				$Customer = $mCus->findByCard(array($IdCard));				
			}
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (isset($Customer)) {
				$request->setProperty('IdCustomer',$Customer->getId());
				$request->setProperty('CustomerName',$Customer->getName());
				$request->setProperty('Discount',$Customer->getDiscount());
			}else {
				$request->setProperty('IdCustomer','');
				$request->setProperty('CustomerName','');
				$request->setProperty('Discount','');
			}
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>