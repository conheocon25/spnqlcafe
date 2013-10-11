<?php
	namespace MVC\Command;	
	class SettingBAlbum extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdKey = $request->getProperty('IdKey');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Title = "ALBUM";
			$Customer = $mCustomer->findByKey($IdKey);			
			$Navigation = array(
				array("THIẾT LẬP", "/".$Customer->getKey()."/setting")
			);
			
			if (!isset($Page)) $Page=1;
			$Config = $mBConfig->findByName("ROW_PER_PAGE");
			$AlbumAll = $mBAlbum->findBy(array($Customer->getId()));
			$AlbumAll1 = $mBAlbum->findByPage(array($Customer->getId(), $Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($AlbumAll->count(), $Config->getValue(), "/setting/album/news" );
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty("Title", $Title);
			$request->setProperty("Page", $Page);
			$request->setProperty("ActiveAdmin", "BAlbum");
			$request->setObject("Navigation", $Navigation);
			$request->setObject("PN", $PN);
			
			$request->setObject("Customer", $Customer);
			$request->setObject("AlbumAll1", $AlbumAll1);
		}
	}
?>