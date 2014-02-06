<?php		
	namespace MVC\Command;	
	class ReportDailySelling extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdTrack 	= $request->getProperty('IdTrack');
			$IdTD 		= $request->getProperty('IdTD');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mDomain 	= new \MVC\Mapper\Domain();
			$mSession 	= new \MVC\Mapper\Session();
			$mTracking 	= new \MVC\Mapper\Tracking();
			$mTD 		= new \MVC\Mapper\TrackingDaily();
			$mConfig 	= new \MVC\Mapper\Config();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$ConfigName = $mConfig->findByName("NAME");
			$TD 		= $mTD->find($IdTD);
			$Tracking	= $mTracking->find($IdTrack);
			$DomainAll	= $mDomain->findAll();
			
			//TỔNG KẾT CA1 01:00 ĐẾN TRƯỚC 11:00
			$Session1All = $mSession->findByTracking( array(
				$TD->getDate()." 1:0:0", 
				$TD->getDate()." 13:59:59"
			));										
			$Value11 		= 0;
			$Value12 		= 0;
			while ($Session1All->valid()){
				$Session = $Session1All->current();
				if ($Session->getStatus()==0)
					$Value11 += $Session->getValue();
				else	
					$Value12 += $Session->getValue();
					
				$Session1All->next();
			}
			$NTotal1 = new \MVC\Library\Number($Value11 + $Value12);
			$NTotal11 = new \MVC\Library\Number($Value11);
			$NTotal12 = new \MVC\Library\Number($Value12);
			
			//TỔNG KẾT CA2 14:00 ĐẾN TRƯỚC 23:59
			$Session2All = $mSession->findByTracking( array(
				$TD->getDate()." 14:00:00", 
				$TD->getDate()." 23:59:59"
			));			
			$Value21 		= 0;
			$Value22 		= 0;
			while ($Session2All->valid()){
				$Session = $Session2All->current();
				if ($Session->getStatus()==0)
					$Value21 += $Session->getValue();
				else	
					$Value22 += $Session->getValue();
					
				$Session2All->next();
			}
			$NTotal2 = new \MVC\Library\Number($Value21 + $Value22);
			$NTotal21 = new \MVC\Library\Number($Value21);
			$NTotal22 = new \MVC\Library\Number($Value22);
						
			$Title 		= "BÁN HÀNG ".$TD->getDatePrint();
			$Navigation = array(
				array("BÁO CÁO"				, "/report"),
				array($Tracking->getName()	, $Tracking->getURLView())
			);
			
			//TỔNG CỘNG
			$NTotal 	= new \MVC\Library\Number($Value11 + $Value21 + $Value12 + + $Value22);
			$NTotal_1 	= new \MVC\Library\Number($Value11 + $Value21 ); 
			$NTotal_2 	= new \MVC\Library\Number($Value12 + $Value22 );
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setProperty('Title'		, $Title);			
			$request->setObject('Navigation'	, $Navigation);
			
			$request->setObject('Session1All'	, $Session1All);
			$request->setObject('NTotal1'		, $NTotal1);
			$request->setObject('NTotal11'		, $NTotal11);
			$request->setObject('NTotal12'		, $NTotal12);
			
			$request->setObject('Session2All'	, $Session2All);
			$request->setObject('NTotal2'		, $NTotal2);
			$request->setObject('NTotal21'		, $NTotal21);
			$request->setObject('NTotal22'		, $NTotal22);
									
			$request->setObject('NTotal'		, $NTotal);
			$request->setObject('NTotal_1'		, $NTotal_1);
			$request->setObject('NTotal_2'		, $NTotal_2);
			
			$request->setObject('TD'			, $TD);
			$request->setObject('DomainAll'		, $DomainAll);
			
			$request->setObject('ConfigName'	, $ConfigName);
		}
	}
?>