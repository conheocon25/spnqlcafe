<?php		
	namespace MVC\Command;	
	class ReportEvalStore extends Command{
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
			$mSupplier = new \MVC\Mapper\Supplier();

			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$mTrackingStore->deleteByTracking(array($IdTrack));
			$Tracking = $mTracking->find($IdTrack);
			$SupplierAll = $mSupplier->findAll();
			while($SupplierAll->valid()){
				$Supplier = $SupplierAll->current();
				$ResourceAll = $Supplier->getResources();
				while($ResourceAll->valid()){
					$Resource = $ResourceAll->current();																				
					$TS = new \MVC\Domain\TrackingStore(
						null,
						$IdTrack,
						$Resource->getId(),
						$Tracking->getResourceOld( $Resource->getId()),
						$Tracking->getResourceImport( $Resource->getId() ),
						$Tracking->getResourceExport( $Resource->getId() ),
						$Tracking->getResourcePrice( $Resource->getId() )
					);
					$mTrackingStore->insert($TS);
					$ResourceAll->next();
				}
				$SupplierAll->next();
			}
			$Title = "TÍNH TOÁN TỒN KHO";
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('Title', $Title);			
			$request->setProperty('URLHeader', $Tracking->getURLView() );
			$request->setObject('Tracking', $Tracking);
		}
	}
?>