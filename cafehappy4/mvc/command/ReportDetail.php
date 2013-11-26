<?php		
	namespace MVC\Command;	
	class ReportDetail extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
														
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------			
			$IdTrack = $request->getProperty("IdTrack");
									
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mTracking = new \MVC\Mapper\Tracking();			
												
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Tracking = $mTracking->find($IdTrack);
			$TrackingAll = $mTracking->findAll();
						
			$DateCurrent = 'THÁNG '.\date("m/Y", strtotime($Tracking->getDateStart()));
			$Title = $Tracking->getName();
			$Navigation = array(				
				array("BÁO CÁO", "/report")
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('DateCurrent', $DateCurrent);
			$request->setProperty('Title', $Title);
			$request->setObject('Navigation', $Navigation);
			$request->setObject('TrackingAll', $TrackingAll);
			$request->setObject('Tracking', $Tracking);						
		}
	}
?>