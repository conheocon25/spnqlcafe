<?php		
	namespace MVC\Command;	
	class ReportStore extends Command{
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
			$mTrackingStore = new \MVC\Mapper\TrackingStore();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Tracking = $mTracking->find($IdTrack);
			$TrackingStoreAll = $mTrackingStore->findBy(array($IdTrack));
			$Value = 0;
			while($TrackingStoreAll->valid()){
				$TS = $TrackingStoreAll->current();
				$Value += $TS->getCountRemainValue();
				$TrackingStoreAll->next();
			}
			$Sum = new \MVC\Library\Number($Value);
			$Title = "THỐNG KÊ TỒN KHO THÁNG ".\date("m/Y", strtotime($Tracking->getDateStart()));
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('Title', $Title);			
			$request->setObject('Tracking', $Tracking);
			$request->setObject('Sum', $Sum);
			$request->setObject('TrackingStoreAll', $TrackingStoreAll);
		}
	}
?>