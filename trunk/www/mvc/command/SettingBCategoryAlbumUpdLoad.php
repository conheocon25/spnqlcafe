<?php
	namespace MVC\Command;	
	class SettingBCategoryAlbumUpdLoad extends Command {
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
			$mCategory = new \MVC\Mapper\BCategoryAlbum();
			$mCustomer = new \MVC\Mapper\Customer();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$Category = $mCategory->find($IdCategory);
			$Customer = $mCustomer->findByKey($IdKey);									
			$Title = mb_strtoupper($Category->getName(), 'UTF8');
			$Navigation = array(
				array("TRANG CHỦ", "/blog/".$Customer->getKey()),
				array("THIẾT LẬP", "/blog/".$Customer->getKey()."/setting"),
				array("ALBUM", $Customer->getURLSettingCategoryAlbum() )
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Category', $Category);			
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveAdmin', 'CategoryAlbum');
			$request->setObject('Navigation', $Navigation);
		}
	}
?>