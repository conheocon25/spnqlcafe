<?php
	namespace MVC\Command;	
	class SettingBImageInsLoad extends Command {
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
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mAlbum = new \MVC\Mapper\BAlbum();
			$mCustomer = new \MVC\Mapper\Customer();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------										
			$Title = "THÊM MỚI";
			$Customer = $mCustomer->findByKey($IdKey);
			$Album = $mAlbum->find($IdAlbum);
			$Navigation = array(
				array("TRANG CHỦ", "/blog/".$Customer->getKey()),
				array("THIẾT LẬP", "/blog/".$Customer->getKey()."/setting"),
				array("ALBUM", $Customer->getURLSettingBAlbum()),
				array(mb_strtoupper($Album->getName(), 'UTF8'), $Album->getURLImage())
			);
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveAdmin', 'CategoryAlbum');
			$request->setObject('Navigation', $Navigation);
			$request->setObject("Customer", $Customer);
			$request->setObject("Album", $Album);
		}
	}
?>