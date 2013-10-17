<?php
	namespace MVC\Command;	
	class SettingAlbumImage extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------			
			$IdAlbum = $request->getProperty('IdAlbum');
			$IdProvince = $request->getProperty('IdProvince');
			$IdDistrict = $request->getProperty('IdDistrict');
			$IdStore = $request->getProperty('IdStore');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------												
			if (!isset($Page)) $Page=1;
			$Config 	= $mConfig->findByName("ROW_PER_PAGE");
			$Album 		= $mAlbum->find($IdAlbum);
			$AlbumAll 	= $mAlbum->findBy(array($IdStore));
			$ImageAll 	= $mImage->findBy(array($IdAlbum));
			$ImageAll1 	= $mImage->findByPage(array($IdAlbum, $Page, $Config->getValue() ));
			$PN 		= new \MVC\Domain\PageNavigation($ImageAll->count(), $Config->getValue(), "/setting/album".$Album->getId() );
			
			$Province 	= $mProvince->find($IdProvince);
			$District 	= $mDistrict->find($IdDistrict);
			$Store 		= $mStore->find($IdStore);
						
			$Title = mb_strtoupper($Album->getName(), 'UTF8');
			$Navigation = array(
				array("THIẾT LẬP", "/setting"),
				array("TỈNH THÀNH", "/setting/province"),
				array(mb_strtoupper($Province->getName(), 'UTF8'), 	$Province->getURLSettingDistrict() ),
				array(mb_strtoupper($District->getName(), 'UTF8'), 	$District->getURLSettingStore() ),
				array(mb_strtoupper($Store->getName(), 'UTF8'),		$District->getURLSettingStore()."/".$Store->getId()."/album" )
			);
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty("Title", $Title);
			$request->setProperty("Page", $Page);
			$request->setProperty("ActiveAdmin", "Album");
			$request->setObject("Navigation", $Navigation);
			$request->setObject("PN", $PN);
						
			$request->setObject("Album", $Album);
			$request->setObject("AlbumAll", $AlbumAll);
			$request->setObject("ImageAll1", $ImageAll1);
		}
	}
?>