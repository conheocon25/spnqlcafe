<?php
	namespace MVC\Command;
	use MVC\Library\Encrypted;	
	class SettingConfigPassExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
				
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			
			$mUser = new \MVC\Mapper\User();				
			$NewPass1 = $request->getProperty("NewPass1");
			$NewPass2 = $request->getProperty("NewPass2");																		
			
			$KeyCafe123app = $request->getProperty('cafe123app');
			
			$Encrypt = new Encrypted();
			$NewPass1 = $Encrypt->DecryptedC2Script($NewPass1,$KeyCafe123app);
			$NewPass2 = $Encrypt->DecryptedC2Script($NewPass2,$KeyCafe123app);
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------	
			
			if($NewPass1 == $NewPass2) {
				$User = $Session->getCurrentUser();
				//echo $User->getEmail();
				$User->setpass($NewPass1);
				//echo "Set pass xong - ".$NewPass1;
				$mUser->update($User);
				$Session->setCurrentUser(new \MVC\Domain\User());
				return self::statuses('CMD_OK');
			}else {
				return self::statuses('CMD_NO_AUTHOR');
			}					
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>