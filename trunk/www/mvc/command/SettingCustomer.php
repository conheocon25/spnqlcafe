<?php		
	namespace MVC\Command;	
	class SettingCustomer extends Command {
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
			$Title = "KHÁCH HÀNG";
			$Navigation = array(
				array("ỨNG DỤNG", "/home"),
				array("THIẾT LẬP", "/setting")
			);
			if (!isset($Page)) $Page=1;
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$CustomerAll = $mCustomer->findAll();
			$CustomerAll1 = $mCustomer->findByPage(array($Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($CustomerAll->count(), $Config->getValue(), "/setting/customer" );
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveAdmin', 'Customer');
			$request->setProperty('Page', $Page);
			$request->setObject('Navigation', $Navigation);
			$request->setObject('CustomerAll1', $CustomerAll1);
			$request->setObject('PN', $PN);			
			$request->setObject('CustomerAll', $CustomerAll);
									
			return self::statuses('CMD_DEFAULT');
		}
	}
?>