<?php
	namespace MVC\Command;
	class SellingDomainTableSessionDetailDelExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
												
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdSessionDetail = $request->getProperty("IdSessionDetail");
									
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mTableLog = new \MVC\Mapper\TableLog();
			$mSession = new \MVC\Mapper\Session();
			$mSD = new \MVC\Mapper\SessionDetail();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$SD = $mSD->find($IdSessionDetail);										
			$Session = $SD->getSession();
			
			$Log = new \MVC\Domain\TableLog(
				null,
				@\MVC\Base\SessionRegistry::getCurrentIdUser(),
				$Session->getIdTable(),
				date('Y-m-d H:i:s'),
				"Xóa chi tiết ".$SD->getCourse()->getName()." số lượng ".$SD->getCount()
			);
			$mTableLog->insert($Log);			
			$mSD->delete(array($IdSessionDetail));
									
			$IdSession = $Session->getId();
			$IdTable = $Session->getIdTable();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty('IdTable', $IdTable);
			$request->setProperty('IdSession', $IdSession);
			
			return self::statuses('CMD_OK');
		}
	}
?>
