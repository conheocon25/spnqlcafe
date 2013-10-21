<?php
	namespace MVC\Command;
	class SellingDomainTableSessionDetailUpdExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
												
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdSessionDetail = $request->getProperty("IdSessionDetail");
			$Count = $request->getProperty("Count");
			$Price = $request->getProperty("Price");
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mTableLog = new \MVC\Mapper\TableLog();
			$mSession = new \MVC\Mapper\Session();
			$mSD = new \MVC\Mapper\SessionDetail();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Count)||!isset($Price))
				return self::statuses('CMD_OK');

			$SD = $mSD->find($IdSessionDetail);
			$Session = $SD->getSession();
			
			$Log = new \MVC\Domain\TableLog(
				null,
				@\MVC\Base\SessionRegistry::getCurrentIdUser(),
				$Session->getIdTable(),
				date('Y-m-d H:i:s'),
				"Cập nhật chi tiết ".$SD->getCourse()->getName()." số lượng ".$SD->getCount()." thành ".$Count
			);
			$mTableLog->insert($Log);
						
			$SD->setCount($Count);
			$SD->setPrice($Price);								
			$mSD->update($SD);
						
			$IdTable = $Session->getIdTable();
			$IdSession = $Session->getId();
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty('IdTable', $IdTable);
			$request->setProperty('IdSession', $IdSession);
			
			return self::statuses('CMD_OK');
		}
	}
?>