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
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$TD 		= $mTD->find($IdTD);
			$Tracking	= $mTracking->find($IdTrack);
			$DomainAll	= $mDomain->findAll();
			
			$SessionAll = $mSession->findByTracking( array(
				$TD->getDate()." 0:0:0", 
				$TD->getDate()." 23:59:59"
			));
			
			$Value1 		= 0;
			$Value2 		= 0;
			while ($SessionAll->valid()){
				$Session = $SessionAll->current();
				if ($Session->getStatus()==0)
					$Value1 += $Session->getValue();
				else	
					$Value2 += $Session->getValue();
					
				$SessionAll->next();
			}
			$NTotal = new \MVC\Library\Number($Value1 + $Value2);
			$NTotal1 = new \MVC\Library\Number($Value1);
			$NTotal2 = new \MVC\Library\Number($Value2);
			
			//Cập nhật kết quả vào DB
			$TD->setSelling($Value1 + $Value2);
			$mTD->update($TD);
			
			$Title 		= "BÁN HÀNG ".$TD->getDatePrint();
			$Navigation = array(
				array("BÁO CÁO"				, "/report"),
				array($Tracking->getName()	, $Tracking->getURLView())
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setProperty('Title'		, $Title);			
			$request->setObject('Navigation'	, $Navigation);
			$request->setObject('NTotal'		, $NTotal);
			$request->setObject('NTotal1'		, $NTotal1);
			$request->setObject('NTotal2'		, $NTotal2);			
			$request->setObject('SessionAll'	, $SessionAll);
			$request->setObject('TD'			, $TD);
			$request->setObject('DomainAll'		, $DomainAll);
		}
	}
?>