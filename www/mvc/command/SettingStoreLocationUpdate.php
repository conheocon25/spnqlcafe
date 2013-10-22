<?php
	namespace MVC\Command;	
	class SettingStoreLocationUpdate extends Command{
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
			$mX 	= $request->getProperty('X');
			$mY 	= $request->getProperty('Y');
			
			echo $mX;
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
			$domainSL 	= $mStoreLocation->findByStore($IdStore);
										
			$domainSL->setX($mX);
			$domainSL->setY($mY);
			
			$mStoreLocation->update($domainSL);
			
												
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			
			return self::statuses('CMD_OK');
		}
	}
?>