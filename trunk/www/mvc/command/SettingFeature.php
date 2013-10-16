<?php		
	namespace MVC\Command;	
	class SettingFeature extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mConfig 	= new \MVC\Mapper\Config();
			$mFeature 	= new \MVC\Mapper\Feature();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$FeatureAll 	= $mFeature->findAll();															
			if (!isset($Page)) $Page=1;
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$FeatureAll1 = $mFeature->findByPage(array($Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($FeatureAll->count(), $Config->getValue(), "/setting/feature" );
			
			$Title = "THẺ TÍNH NĂNG";
			$Navigation = array(				
				array("THIẾT LẬP", "/setting")
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('Title', $Title);
			$request->setProperty('Page', $Page);
			$request->setProperty('ActiveAdmin', 'Tag');
			$request->setObject('Navigation', $Navigation);
			$request->setObject('PN', $PN);
			
			$request->setObject('FeatureAll1'	, $FeatureAll1);
			$request->setObject('FeatureAll'	, $FeatureAll);
									
			return self::statuses('CMD_DEFAULT');
		}
	}
?>