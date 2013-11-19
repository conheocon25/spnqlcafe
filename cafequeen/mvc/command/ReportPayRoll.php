<?php		
	namespace MVC\Command;	
	class ReportPayRoll extends Command{
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
			$mEmployee 	= new \MVC\Mapper\Employee();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Tracking 		= $mTracking->find($IdTrack);			
			$EmployeeAll 	= $mEmployee->findAll();
			
			$Data 		= array();
			$Sum 		= 0;
			$Index		= 1;
			while ($EmployeeAll->valid()){
				$Employee = $EmployeeAll->current();
									
				$Data[] = array(	
					$Index++, 
					$Employee->getName(),
					$Tracking->getPaidEmployeeValuePrint( 	$Employee->getId() ),
					$Tracking->getPayRollValuePrint( 		$Employee->getId() ),
					$Tracking->getPayRollRealPrint( 		$Employee->getId() )
				);					
				$EmployeeAll->next();
			}
			$NSum = new \MVC\Library\Number(0);
			
			if ($Save=="yes"){
				if ($Sum<0)$Sum=0;
				$Tracking->setStoreValue($Sum);
				$mTracking->update($Tracking);
			}
			
			$Title = "BẢNG LƯƠNG";
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