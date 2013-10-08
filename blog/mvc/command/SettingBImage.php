<?php
	namespace MVC\Command;	
	class SettingBImage extends Command{
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
			$IdAlbum = $request->getProperty('IdAlbum');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------												
			if (!isset($Page)) $Page=1;
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$Album = $mBAlbum->find($IdAlbum);
			$AlbumAll = $mBAlbum->findAll();
			$ImageAll = $mBImage->findBy(array($IdAlbum));
			$ImageAll1 = $mBImage->findByPage(array($IdAlbum, $Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($ImageAll->count(), $Config->getValue(), "/setting/category/news" );
			
			$Title = mb_strtoupper($Album->getName(), 'UTF8');
			$Customer = $mCustomer->findByKey($IdKey);
			$Navigation = array(
				array("TRANG CHỦ", "/blog/".$Customer->getKey()),
				array("THIẾT LẬP", "/blog/".$Customer->getKey()."/setting"),
				array("ALBUM", $Customer->getURLSettingBAlbum())
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty("Title", $Title);
			$request->setProperty("Page", $Page);
			$request->setProperty("ActiveAdmin", "BAlbum");
			$request->setObject("Navigation", $Navigation);
			$request->setObject("PN", $PN);
			
			$request->setObject("Customer", $Customer);
			$request->setObject("Album", $Album);
			$request->setObject("AlbumAll", $AlbumAll);
			$request->setObject("ImageAll1", $ImageAll1);
		}
	}
?>