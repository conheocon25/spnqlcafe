<?php		
	namespace MVC\Command;	
	class SettingAlbumInsLoad extends Command{
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
			$Category = $mCategoryAlbum->find($IdCategory);
			$CategoryAll = $mCategoryAlbum->findAll();
			
			$Title = "THÊM MỚI";
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
			$request->setObject('Category', $Category);
			$request->setObject('CategoryAll', $CategoryAll);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>