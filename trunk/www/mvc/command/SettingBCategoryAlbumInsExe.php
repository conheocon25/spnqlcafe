<?php
	namespace MVC\Command;	
	class SettingBCategoryAlbumInsExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$IdKey = $request->getProperty('IdKey');
			$Name = $request->getProperty('Name');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCustomer = new \MVC\Mapper\Customer();
			$mCategory = new \MVC\Mapper\BCategoryAlbum();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Name)||$Name=="")
				return self::statuses('CMD_OK');
			
			$Customer = $mCustomer->findByKey($IdKey);
			$Category = new \MVC\Domain\BCategoryAlbum(
				null,
				$Customer->getId(),
				$Name,				
				0,
				"abc"			
			);
			$Category->reKey();
			$mCategory->insert($Category);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>
