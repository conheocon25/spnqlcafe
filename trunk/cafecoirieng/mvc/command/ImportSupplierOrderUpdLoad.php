<?php		
	namespace MVC\Command;	
	class ImportSupplierOrderUpdLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$IdSupplier = $request->getProperty("IdSupplier");
			$IdOrderImport = $request->getProperty("IdOrderImport");
			$IdResource = $request->getProperty("IdResource");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			
			$mSupplier = new \MVC\Mapper\Supplier();
			$mOI = new \MVC\Mapper\OrderImport();
			$mOID = new \MVC\Mapper\OrderImportDetail();
			$mResource = new \MVC\Mapper\Resource();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$User = $Session->getCurrentUser();
			
			$OI = $mOI->find($IdOrderImport);
			$Supplier = $mSupplier->find($IdSupplier);
			$Resource = $mResource->find($IdResource);
						
			$Title = mb_strtoupper("NHẬP HÀNG / ".$Supplier->getName()." / ".$OI->getDatePrint()." / ".$Resource->getName()." / CẬP NHẬT", 'UTF8');
			
			//Kiểm tra xem record có tồn tại chưa
			$IdOID = $mOID->exist(array($IdOrderImport, $IdResource));
			
			if ($IdOID>0){
				$OID = $mOID->find($IdOID);
				$Price = $OID->getPrice();
				$Count = $OID->getCount();
			}else{
				$Price = $Resource->getPrice();
				$Count = 1;
			}
			$DetailURLUpdExe = "/import/".$Supplier->getId()."/".$OI->getId()."/".$Resource->getId()."/upd/exe";
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty('Title', $Title);			
			$request->setProperty('DetailURLUpdExe', $DetailURLUpdExe);
			
			$request->setProperty('URLHeader', $OI->getURLDetail());
			$request->setProperty('Count', $Count);
			$request->setProperty('Price', $Price);
		}
	}
?>