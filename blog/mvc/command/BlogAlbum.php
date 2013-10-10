<?php
	namespace MVC\Command;	
	use MVC\Library\Captcha;
	class BlogAlbum extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdKey 		= $request->getProperty('IdKey');
			$IdAlbum 	= $request->getProperty('IdAlbum');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCustomer = new \MVC\Mapper\Customer();
			$mBAlbum = new \MVC\Mapper\BAlbum();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Customer = $mCustomer->findByKey($IdKey);
			$Album = $mBAlbum->find($IdAlbum);
			
			$Navigation = array();
			$Title = mb_strtoupper($Album->getName(), 'UTF8');
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject("Navigation", $Navigation);
			$request->setObject("Title", $Title);
			$request->setProperty("ActiveAdmin", "");
			
			$request->setObject("Customer", $Customer);
			$request->setObject("Album", $Album);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>