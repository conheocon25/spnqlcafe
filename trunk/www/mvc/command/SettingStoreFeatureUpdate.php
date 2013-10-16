<?php
	namespace MVC\Command;	
	class SettingStoreFeatureUpdate extends Command{
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
			$IdFeature 	= $request->getProperty('IdFeature');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mStoreFeature 	= new \MVC\Mapper\StoreFeature();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$SF = $mStoreFeature->check(array($IdStore, $IdFeature));
			
			if ($SF->count()==1){				
				$mStoreFeature->delete(array($SF->current()->getId()));
			}else{
				$SF = new \MVC\Domain\StoreFeature(
					null,
					$IdFeature,
					$IdStore
				);
				$mStoreFeature->insert($SF);
			}
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			return self::statuses('CMD_OK');
		}
	}
?>