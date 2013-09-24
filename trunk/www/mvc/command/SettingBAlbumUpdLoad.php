<?php
	namespace MVC\Command;	
	class SettingBAlbumUpdLoad extends Command {
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
			$IdCategory = $request->getProperty('IdCategory');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mAlbum = new \MVC\Mapper\BAlbum();
			$mCustomer = new \MVC\Mapper\Customer();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$Category = $mAlbum->find($IdCategory);
			$Customer = $mCustomer->findByKey($IdKey);									
			$Title = mb_strtoupper($Category->getName(), 'UTF8');
			$Navigation = array(
				array("TRANG CHỦ", "/blog/".$Customer->getKey()),
				array("THIẾT LẬP", "/blog/".$Customer->getKey()."/setting"),
				array("ALBUM", $Customer->getURLSettingBAlbum() )
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Category', $Category);
			$request->setObject('Customer', $Customer);
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveAdmin', 'CategoryAlbum');
			$request->setObject('Navigation', $Navigation);
		}
	}
?>