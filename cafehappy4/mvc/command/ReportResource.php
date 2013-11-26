<?php		
	namespace MVC\Command;	
	class ReportResource extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
														
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------			
			$IdTrack = $request->getProperty('IdTrack');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mTracking = new \MVC\Mapper\Tracking();
			$mSupplier = new \MVC\Mapper\Supplier();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Tracking = $mTracking->find($IdTrack);
			$SupplierAll = $mSupplier->findAll();
			$Title = "THỐNG KÊ NHẬP HÀNG ".\date("m/Y", strtotime( $Tracking->getDateStart() ));
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('Title', $Title);
			$request->setObject('Tracking', $Tracking);
			$request->setObject('SupplierAll', $SupplierAll);
		}
	}
?>