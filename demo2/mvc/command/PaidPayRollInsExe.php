<?php
	namespace MVC\Command;
	class PaidPayRollInsExe extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdEmployee = $request->getProperty('IdEmployee');						
			$Date = $request->getProperty('Date');			
			$ValueBase = $request->getProperty('ValueBase');
			$ValueSub = $request->getProperty('ValueSub');
			$Note = $request->getProperty('Note');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			
			$mPPR = new \MVC\Mapper\PaidPayRoll();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Date))
				return self::statuses('CMD_OK');
				
			$PPR = new \MVC\Domain\PaidPayRoll(
				null,
				$IdEmployee,
				$Date,
				$ValueBase,
				$ValueSub,
				$Note
			);
			$mPPR->Insert($PPR);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
			
		}
	}
?>
