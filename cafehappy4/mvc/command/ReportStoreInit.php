<?php		
	namespace MVC\Command;	
	class ReportStoreInit extends Command{
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
			$mTracking 	= new \MVC\Mapper\Tracking();
			$mTS 		= new \MVC\Mapper\TrackingStore();
			$mR2C 		= new \MVC\Mapper\R2C();
			$mCourse 	= new \MVC\Mapper\Course();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Tracking = $mTracking->find($IdTrack);
			if ($Tracking->getTrackingStore()->count()>0)
				return self::statuses('CMD_OK');
				
			$CourseAll = $mCourse->findAll();
			while($CourseAll->valid()){
				$Course = $CourseAll->current();
				
				$R2CAll = $mR2C->findBy(array($Course->getId()));
				if ($R2CAll->count()>0){
				
					$R2CAll->rewind();
					$PriceAverage = 0;
					while ($R2CAll->valid()){
						$R2C = $R2CAll->current();
						$PriceAverage += $R2C->getResource()->getPriceAverage();
						$R2CAll->next();
					}
					$PriceAverage = $PriceAverage/$R2CAll->count();
					$TS = new \MVC\Domain\TrackingStore(
						null,
						$Tracking->getId(),
						$Course->getId(),
						0,
						0,
						0,
						$PriceAverage
					);
					$mTS->insert($TS);
				}												
				$CourseAll->next();
			}			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
			return self::statuses('CMD_OK');
		}
	}
?>