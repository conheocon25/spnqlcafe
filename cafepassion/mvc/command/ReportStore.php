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
			$Save = $request->getProperty('Save');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mTracking 	= new \MVC\Mapper\Tracking();
			$mCourse 	= new \MVC\Mapper\Course();
			$mR2C  		= new \MVC\Mapper\R2C();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Tracking 	= $mTracking->find($IdTrack);			
			$CourseAll = $mCourse->findAll();
			
			$Data 		= array();
			$Sum 		= 0;
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
					
					$NewCount  		= $OldCount + $ImportCount - $ExportCount;
					$NewValue  		= $NewCount*$PriceAverage;
					
					$NNewValue		= new \MVC\Library\Number($NewValue);
					$NPriceAverage	= new \MVC\Library\Number($PriceAverage);
					
					$Data[] = array(	
						$Course->getId(), 
						$Course->getName(),
						$Course->getUnit(),
						$OldCount,
						$ImportCount,
						$ExportCount, 
						$NPriceAverage->formatCurrency(),
						$NewCount,
						$NNewValue->formatCurrency()
					);
					$Sum += $NewValue;
				}
				$CourseAll->next();
			}
			$NSum = new \MVC\Library\Number($Sum);
			
			if ($Save=="yes"){
				if ($Sum<0)$Sum=0;
				$Tracking->setStoreValue($Sum);
				$mTracking->update($Tracking);
			}
			
			$Title = "TỒN KHO";
			$Navigation = array(				
				array("BÁO CÁO", "/report"),
				array($Tracking->getName(), $Tracking->getURLView() )
			);
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('Title'		, $Title);
			$request->setProperty('Sum'			, $NSum->formatCurrency() );
			$request->setObject('Tracking'		, $Tracking);
			$request->setObject('Data'			, $Data);
			$request->setObject('Navigation'	, $Navigation);
		}
	}
?>