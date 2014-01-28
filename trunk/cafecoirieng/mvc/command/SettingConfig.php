<?php		
	namespace MVC\Command;	
	class SettingConfig extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$ConfigAll = $mConfig->findAll();
			
			$Title = "CẤU HÌNH";
			$Navigation = array(				
				array("THIẾT LẬP", "/setting")
			);
			
			$RowPerPage 	= $mConfig->findByName("ROW_PER_PAGE");
			$Every5Minutes 	= $mConfig->findByName("EVERY_5_MINUTES");
			$GuestVisit 	= $mConfig->findByName("GUEST_VISIT");
			$Discount 		= $mConfig->findByName("DISCOUNT");
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveAdmin', 'Config');			
			$request->setObject('Navigation', $Navigation);
			
			$request->setObject('RowPerPage', 		$RowPerPage);
			$request->setObject('Every5Minutes', 	$Every5Minutes);
			$request->setObject('GuestVisit', 		$GuestVisit);
			$request->setObject('Discount', 		$Discount);
												
			return self::statuses('CMD_DEFAULT');
		}
	}
?>