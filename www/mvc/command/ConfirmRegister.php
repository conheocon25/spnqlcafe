<?php
	namespace MVC\Command;		
	use MVC\Library\Mail;
	class ConfirmRegister extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------			
			$EncodeEmailRegister = $request->getProperty('EmailRegister');
			
			echo $EncodeEmailRegister;
			
			$EmailRegister = base64_decode($EncodeEmailRegister);
			
			echo $EmailRegister;
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			//base64_decode($str)
			//base64_encode($str)
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------										
			if (isset($EmailRegister)){				
				//đang ký user cho hệ thống tại đây!					
			}
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>