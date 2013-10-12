<?php
	namespace MVC\Command;	
	class SettingNews extends Command{
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
			$Title = "TIN TỨC";			
			$Navigation = array(
				array("THIẾT LẬP", "/setting")
			);
			
			if (!isset($Page)) $Page=1;
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$NewsAll = $mNews->findAll();
			$NewsAll1 = $mNews->findByPage(array($Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($NewsAll->count(), $Config->getValue(), "/setting/news" );
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty("Title", $Title);
			$request->setProperty("Page", $Page);
			$request->setProperty("ActiveAdmin", "News");
			$request->setObject("Navigation", $Navigation);
			$request->setObject("PN", $PN);						
			$request->setObject("NewsAll1", $NewsAll1);
		}
	}
?>