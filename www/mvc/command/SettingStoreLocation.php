<?php
	namespace MVC\Command;	
	class SettingStoreLocation extends Command{
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
			$IdStore 	= $request->getProperty('IdStore');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mProvince 			= new \MVC\Mapper\Province();
			$mDistrict 			= new \MVC\Mapper\District();
			$mStoreLocation 	= new \MVC\Mapper\StoreLocation();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Province 	= $mProvince->find($IdProvince);
			$District 	= $mDistrict->find($IdDistrict);
			$SL 		= $mStoreLocation->findByStore($IdStore);
			
			$Title = mb_strtoupper($SL->getStore()->getName(), 'UTF8');
			$Navigation = array(
				array("THIẾT LẬP", "/setting"),
				array("TỈNH THÀNH", "/setting/province"),
				array(mb_strtoupper($Province->getName(), 'UTF8'), $Province->getURLSettingDistrict() ),
				array(mb_strtoupper($District->getName(), 'UTF8'), $District->getURLSettingStore() )
			);										
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty("Title"	, $Title);
			$request->setObject("Navigation", $Navigation);
			$request->setObject("SL"		, $SL);
		}
	}
?>