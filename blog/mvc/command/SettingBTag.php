<?php
	namespace MVC\Command;	
	class SettingBTag extends Command{
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
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Title = "THẺ";
			$Customer = $mCustomer->findByKey($IdKey);			
			$Navigation = array(
				array("THIẾT LẬP", "/".$Customer->getKey()."/setting")
			);
			
			if (!isset($Page)) $Page=1;
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$CategoryAll = $mCategoryNews->findAll();
			$PN = new \MVC\Domain\PageNavigation($CategoryAll->count(), $Config->getValue(), "/setting/category/news" );
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty("Title", $Title);
			$request->setProperty("Page", $Page);
			$request->setProperty("ActiveAdmin", "CategoryNews");
			$request->setObject("Navigation", $Navigation);
			$request->setObject("PN", $PN);
			
			$request->setObject("Customer", $Customer);
			$request->setObject("CategoryAll", $CategoryAll);
		}
	}
?>