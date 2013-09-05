<?php
	namespace MVC\Command;
	class ImportSupplierDelExe extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdOrderImport = $request->getProperty('IdOrderImport');
											
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mOI = new \MVC\Mapper\OrderImport();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------													
			$OI = $mOI->find($IdOrderImport);
			if (!isset($OI))
				return self::statuses('CMD_OK');
				
			$mOI->delete(array($IdOrderImport));													
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
			
		}
	}
?>
