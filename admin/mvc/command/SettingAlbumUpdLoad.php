<?php		
	namespace MVC\Command;	
	class SettingAlbumUpdLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------			
			$IdCategory = $request->getProperty('IdCategory');
			$IdAlbum = $request->getProperty('IdAlbum');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------																					
			$Album = $mAlbum->find($IdAlbum);
			$Category = $mCategoryAlbum->find($IdCategory);
			$CategoryAll = $mCategoryAlbum->findAll();
			
			$Title = mb_strtoupper($Album->getName(), 'UTF8');
			$Navigation = array(
				array("ỨNG DỤNG", "/home"),
				array("THIẾT LẬP", "/setting"),
				array("ALBUM", "/setting/category/album"),
				array(mb_strtoupper($Category->getName(), 'UTF8'), $Category->getURLView())
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('Title', $Title);			
			$request->setObject('Navigation', $Navigation);
			$request->setObject('Album', $Album);
			$request->setObject('Category', $Category);
			$request->setObject('CategoryAll', $CategoryAll);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>