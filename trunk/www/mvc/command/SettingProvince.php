<?php		
	namespace MVC\Command;	
	class SettingProvince extends Command {
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
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$ProvinceAll = $mProvince->findAll();
						
			$Title = "TỈNH THÀNH";
			$Navigation = array(				
				array("THIẾT LẬP", "/setting")
			);
			
			if (!isset($Page)) $Page=1;
			$Config 	= $mConfig->findByName("ROW_PER_PAGE");
						
			$ProvinceAll1 = $mProvince->findByPage(array($Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($ProvinceAll->count(), $Config->getValue(), "/setting/Province" );
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('Title'		, $Title);
			$request->setProperty('ActiveAdmin'	, 'Province');
			$request->setProperty('Page'		, $Page);
			$request->setObject('PN'			, $PN);
			$request->setObject('Navigation'	, $Navigation);
						
			$request->setObject('ProvinceAll1'	, $ProvinceAll1);
															
			return self::statuses('CMD_DEFAULT');
		}
	}
?>