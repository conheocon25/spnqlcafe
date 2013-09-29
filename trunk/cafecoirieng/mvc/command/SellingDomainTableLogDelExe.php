<?php
	namespace MVC\Command;
	class SellingDomainTableLogDelExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			//$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------						
			$IdSession = $request->getProperty("IdSession");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mSession = new \MVC\Mapper\Session();
			$mTableLog = new \MVC\Mapper\TableLog();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Session = $mSession->find($IdSession);
			if (!isset($Session))
				return self::statuses('CMD_OK');
							
			$Log = new \MVC\Domain\TableLog(
				null,
				$Session->getIdTable(),
				date('Y-m-d H:i:s'),
				"Xóa nhật kí ".$Session->getDateTime()
			);
			$mTableLog->insert($Log);
			
			$mSession->delete(array($IdSession));
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			return self::statuses('CMD_OK');
		}
	}
?>
