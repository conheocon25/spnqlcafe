<?php
	namespace MVC\Command;	
	use MVC\Library\Captcha;
	class Video extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCategoryVideo = $request->getProperty('IdCategoryVideo');
			$MsgCaptcha = $request->getProperty('MsgCaptcha');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Title = "HỆ THỐNG QUẢN LÝ PHÒNG KARAOKE";
			$CategoryVideoAll = $mCategoryVideo->findAll();
			$Category = $mCategoryVideo->find($IdCategoryVideo);
			
			$mCaptcha = new Captcha();			
			$mCaptcha->createImage();
			$CaptchaSecurited = $mCaptcha->getSecurityCode();
			$Session->setCurrentCaptcha($CaptchaSecurited);			
			$CaptchaSecurity = $Session->getCurrentCaptcha();
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setObject("CategoryVideoAll", $CategoryVideoAll);
			$request->setObject("Category", $Category);
			
			$request->setProperty("CaptchaSecurity", $CaptchaSecurited);		
			$request->setProperty("MsgCaptcha", $MsgCaptcha);					
			$request->setProperty("Title", $Title);
			$request->setProperty("URLHeader", '/signin/load');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>