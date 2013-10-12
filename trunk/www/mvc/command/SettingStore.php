<?php
	namespace MVC\Command;	
	class SettingStore extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Title = "QUÁN";			
			$Navigation = array(
				array("THIẾT LẬP", "/setting")
			);
			
			if (!isset($Page)) $Page=1;
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$StoreAll = $mStore->findAll();
			$StoreAll1 = $mStore->findByPage(array($Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($StoreAll->count(), $Config->getValue(), "/setting/store" );
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty("Title", $Title);
			$request->setProperty("Page", $Page);
			$request->setProperty("ActiveAdmin", "Store");
			$request->setObject("Navigation", $Navigation);
			$request->setObject("PN", $PN);						
			$request->setObject("StoreAll1", $StoreAll1);
		}
	}
?>