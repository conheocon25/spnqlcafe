<?php		
	namespace MVC\Command;	
	class SettingAlbum extends Command {
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
			$IdCategory = $request->getProperty('IdCategory');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------												
			if (!isset($Page)) $Page=1;
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			
			$CategoryAll = $mCategoryAlbum->findAll();
			$Category = $mCategoryAlbum->find($IdCategory);
			
			$AlbumAll = $mAlbum->findByPage(array($IdCategory, $Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($Category->getAlbumAll()->count(), $Config->getValue(), $Category->getURLView() );
			
			$Title = mb_strtoupper($Category->getName(), 'UTF8');
			$Navigation = array(
				array("ỨNG DỤNG", "/home"),
				array("THIẾT LẬP", "/setting"),
				array("ALBUM", "/setting/category/album")
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('Title', $Title);			
			$request->setObject('Navigation', $Navigation);
			$request->setObject('PN', $PN);
			$request->setProperty('Page', $Page);
			$request->setObject('Category', $Category);
			$request->setObject('CategoryAll', $CategoryAll);
			$request->setObject('AlbumAll', $AlbumAll);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>