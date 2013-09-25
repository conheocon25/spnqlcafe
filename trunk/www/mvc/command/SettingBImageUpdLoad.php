<?php
	namespace MVC\Command;	
	class SettingBImageUpdLoad extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdKey = $request->getProperty('IdKey');
			$IdAlbum = $request->getProperty('IdAlbum');
			$IdImage = $request->getProperty('IdImage');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mAlbum = new \MVC\Mapper\BAlbum();
			$mImage = new \MVC\Mapper\BImage();
			$mCustomer = new \MVC\Mapper\Customer();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$Album = $mAlbum->find($IdAlbum);
			$Image = $mImage->find($IdImage);
			$Customer = $mCustomer->findByKey($IdKey);									
			
			$Title = mb_strtoupper($Image->getName(), 'UTF8');
			$Navigation = array(
				array("TRANG CHỦ", "/blog/".$Customer->getKey()),
				array("THIẾT LẬP", "/blog/".$Customer->getKey()."/setting"),
				array("ALBUM", $Customer->getURLSettingBAlbum() ),
				array(mb_strtoupper($Album->getName(), 'UTF8'), $Album->getURLImage() )
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Image', $Image);
			$request->setObject('Customer', $Customer);
			$request->setProperty('Title', $Title);
			$request->setObject('Navigation', $Navigation);
		}
	}
?>