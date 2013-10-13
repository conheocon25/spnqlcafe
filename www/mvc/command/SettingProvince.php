<?php
	namespace MVC\Command;	
	class SettingProvince extends Command{
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
			$Title = "ALBUM";			
			$Navigation = array(
				array("THIẾT LẬP", "/setting")
			);
			
			if (!isset($Page)) $Page=1;
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$ProvinceAll = $mProvince->findAll();
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty("Title", $Title);						
			$request->setProperty("ActiveAdmin", "Province");
			$request->setObject("Navigation", $Navigation);
			$request->setObject("ProvinceAll", $ProvinceAll);
		}
	}
?>