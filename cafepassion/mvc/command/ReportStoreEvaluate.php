<?php		
	namespace MVC\Command;	
	class ReportStoreEvaluate extends Command{
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
			$mR2C  		= new \MVC\Mapper\R2C();
			$mCourse  	= new \MVC\Mapper\Course();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Tracking 	= $mTracking->find($IdTrack);
			if ($Tracking->getTrackingStore()->count()>0)
				return self::statuses('CMD_OK');
			$CourseAll = $mCourse->findAll();
			
			while ($CourseAll->valid()){
				$Course = $CourseAll->current();				
				
				//Tính phần nhập hàng
				$R2CAll = $mR2C->findBy(array($Course->getId()));
				
				//Nếu có trong bảng ánh xạ mới tính toán
				if ($R2CAll->count()>0){				
					$R2CAll->rewind();
					
					$PriceAverage 	= 0;
					$OldCount		= 0;
					$ImportCount	= 0;
					
					//Nhiều nhà cung cấp cho một sản phẩm bán cho nên phải lấy tổng số lượng hoặc trung bình cộng giá
					while ($R2CAll->valid()){
						$R2C = $R2CAll->current();
						$PriceAverage += $R2C->getResource()->getPriceAverage();						
						$ImportCount  += $Tracking->getResourceImport( $R2C->getIdResource() );
						$R2CAll->next();
					}
					$OldCount  	  += $Tracking->getCourseOld( $Course->getId() );
					$PriceAverage = $PriceAverage/$R2CAll->count();																			
					//Bán hàng thực tế
					$ExportCount  	= $Tracking->getCountCourse( $Course->getId() );
															
					$TS = new \MVC\Domain\TrackingStore(
						null,
						$Tracking->getId(),
						$Course->getId(),
						$OldCount,
						$ImportCount,
						$ExportCount,
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