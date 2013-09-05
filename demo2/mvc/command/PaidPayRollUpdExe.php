<?php
	namespace MVC\Command;
	class PaidPayRollUpdExe extends Command{
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
			$Date = $request->getProperty('Date');			
			$ValueBase = $request->getProperty('ValueBase');
			$ValueSub = $request->getProperty('ValueSub');
			$ValuePre = $request->getProperty('ValuePre');
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
				
			$PPR = $mPPR->find($IdPaid);
			$PPR->setDate($Date);
			$PPR->setValueBase($ValueBase);
			$PPR->setValueSub($ValueSub);
			$PPR->setValuePre($ValuePre);
			$PPR->setNote($Note);
			$mPPR->update($PPR);
					
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>
