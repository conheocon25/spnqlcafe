<?php
	namespace MVC\Command;	
	class SettingDistrictStore extends Command{
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
			$IdDistrict = $request->getProperty('IdDistrict');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mProvince = new \MVC\Mapper\Province();
			$mDistrict = new \MVC\Mapper\District();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Province = $mProvince->find($IdProvince);
			$District = $mDistrict->find($IdDistrict);
			
			$Title = mb_strtoupper($District->getName(), 'UTF8');
			$Navigation = array(
				array("THIẾT LẬP", "/setting"),
				array("TỈNH THÀNH", "/setting/province"),
				array(mb_strtoupper($Province->getName(), 'UTF8'), $Province->getURLSettingDistrict() )
			);						
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty("Title", $Title);						
			$request->setProperty("ActiveAdmin", "Province");
			$request->setObject("Navigation", $Navigation);
			$request->setObject("Province", $Province);
			$request->setObject("District", $District);
		}
	}
?>