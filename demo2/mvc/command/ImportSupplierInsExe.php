<?php
	namespace MVC\Command;	
	class ImportSupplierInsExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdSupplier = $request->getProperty('IdSupplier');
			$Date = $request->getProperty('Date');			
			$Note = $request->getProperty('Note');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			
			$mOI = new \MVC\Mapper\OrderImport();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Date))
				return self::statuses('CMD_OK');
				
			$OI = new \MVC\Domain\OrderImport(
				null,
				$IdSupplier,
				$Date,				
				$Note
			);
			$mOI->Insert($OI);
			
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>