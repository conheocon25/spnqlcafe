<?php
	namespace MVC\Command;
	class PaidPayRollDelExe extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdPaid = $request->getProperty('IdPaid');
											
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			
			$mPPR = new \MVC\Mapper\PaidPayRoll();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------													
			$PS = $mPPR->find($IdPaid);
			if (!isset($PS))
				return self::statuses('CMD_OK');
				
			$mPPR->delete(array($IdPaid));
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
			
		}
	}
?>
