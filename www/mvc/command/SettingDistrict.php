<?php
	namespace MVC\Command;	
	class SettingDistrict extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdProvince = $request->getProperty('IdProvince');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mProvince = new \MVC\Mapper\Province();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$Province = $mProvince->find($IdProvince);
			$Title = mb_strtoupper($Province->getName(), 'UTF8');
			$Navigation = array(
				array("THIẾT LẬP", "/setting"),
				array("TỈNH THÀNH", "/setting/province")
			);						
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty("Title", $Title);						
			$request->setProperty("ActiveAdmin", "Province");
			$request->setObject("Navigation", $Navigation);
			$request->setObject("Province", $Province);
		}
	}
?>