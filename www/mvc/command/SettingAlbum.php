<?php
	namespace MVC\Command;	
	class SettingAlbum extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Title = "ALBUM";			
			$Navigation = array(
				array("THIẾT LẬP", "/setting")
			);
			
			if (!isset($Page)) $Page=1;
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$AlbumAll = $mAlbum->findAll();
			$AlbumAll1 = $mAlbum->findByPage(array($Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($AlbumAll->count(), $Config->getValue(), "/setting/album" );
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty("Title", $Title);
			$request->setProperty("Page", $Page);
			$request->setProperty("ActiveAdmin", "Album");
			$request->setObject("Navigation", $Navigation);
			$request->setObject("PN", $PN);						
			$request->setObject("AlbumAll1", $AlbumAll1);
		}
	}
?>