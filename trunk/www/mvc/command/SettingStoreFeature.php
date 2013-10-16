<?php
	namespace MVC\Command;	
	class SettingStoreFeature extends Command{
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
			$mProvince 	= new \MVC\Mapper\Province();
			$mDistrict 	= new \MVC\Mapper\District();
			$mStore 	= new \MVC\Mapper\Store();
			$mFeature 	= new \MVC\Mapper\Feature();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Province 	= $mProvince->find($IdProvince);
			$District 	= $mDistrict->find($IdDistrict);
			$Store 		= $mStore->find($IdStore);
			$FeatureAll = $mFeature->findAll();
			
			$Title = mb_strtoupper($Store->getName(), 'UTF8');
			$Navigation = array(
				array("THIẾT LẬP", "/setting"),
				array("TỈNH THÀNH", "/setting/province"),
				array(mb_strtoupper($Province->getName(), 'UTF8'), $Province->getURLSettingDistrict() ),
				array(mb_strtoupper($District->getName(), 'UTF8'), $District->getURLSettingStore() )
			);						
			$URL = "/setting/province/".$Province->getId()."/".$District->getId()."/".$Store->getId()."/feature/";
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty("Title"	, $Title);
			$request->setProperty("URL"		, $URL);
			$request->setObject("Navigation", $Navigation);
			$request->setObject("FeatureAll", $FeatureAll);
			$request->setObject("Store"		, $Store);
		}
	}
?>