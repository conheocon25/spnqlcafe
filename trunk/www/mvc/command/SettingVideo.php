<?php		
	namespace MVC\Command;	
	class SettingVideo extends Command{
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
			$VideoAll = $mVideo->findAll();						
			$ConfigAll = $mConfig->findAll();
			
			$Title = "VIDEO";
			$Navigation = array(				
				array("THIẾT LẬP", "/setting")
			);
			if (!isset($Page)) $Page=1;
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$VideoAll1 = $mVideo->findByPage(array($Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($VideoAll->count(), $Config->getValue(), "/setting/video" );
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('Title', $Title);
			$request->setProperty('Page', $Page);
			$request->setProperty('ActiveAdmin', 'Video');
			$request->setObject('Navigation', $Navigation);
			$request->setObject('PN', $PN);
			
			$request->setObject('VideoAll1'	, $VideoAll1);
			$request->setObject('VideoAll'	, $VideoAll);			
			$request->setObject('ConfigAll'	, $ConfigAll);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>