<?php
	namespace MVC\Command;	
	class ImportSupplierInsLoad extends Command {
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
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mSupplier = new \MVC\Mapper\Supplier();
									
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Supplier = $mSupplier->find($IdSupplier);
			$Title = "NHẬP HÀNG / ".mb_strtoupper($Supplier->getName()." / THÊM", 'UTF8');
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setProperty('Title', $Title);
			$request->setProperty('URLHeader', $Supplier->getURLImport());
			$request->setObject('Supplier', $Supplier);			
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>