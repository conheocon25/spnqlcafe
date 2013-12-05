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
			
			$TDAll = $Tracking->getDailyAll();
			if ($TDAll->count()==0){
				$Tracking->generateDaily();
			}
			
			$ValueSelling 	= 0;
			$ValueImport 	= 0;
			$ValueStore 	= 0;
			$ValuePaid 		= 0;
			$ValueCollect	= 0;
			$ValueNew		= 0;
			while ($TDAll->valid()){
				$TD = $TDAll->current();
				$ValueSelling 	+= $TD->getSelling();
				$ValueImport 	+= $TD->getImport();
				$ValueStore 	+= $TD->getStore();
				$ValuePaid 		+= $TD->getPaid();
				$ValueCollect	+= $TD->getCollect();				
				$TDAll->next();		
			}
			$ValueNew		= $ValueSelling + $ValueStore + $ValueCollect - $ValueImport - $ValuePaid;
			$NValueSelling 	= new \MVC\Library\Number($ValueSelling);
			$NValueImport 	= new \MVC\Library\Number($ValueImport);
			$NValueStore 	= new \MVC\Library\Number($ValueStore);
			$NValuePaid 	= new \MVC\Library\Number($ValuePaid);
			$NValueCollect 	= new \MVC\Library\Number($ValueCollect);
			$NValueNew 		= new \MVC\Library\Number($ValueNew);
			
			$Title = $Tracking->getName();
			$Navigation = array(				
				array("BÁO CÁO", "/report")
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty('Title'		, $Title);			
			$request->setObject('Navigation'	, $Navigation);
			$request->setObject('TrackingAll'	, $TrackingAll);
			$request->setObject('Tracking'		, $Tracking);
			
			$request->setObject('ValueSelling'	, $NValueSelling);
			$request->setObject('ValueImport'	, $NValueImport);
			$request->setObject('ValueStore'	, $NValueStore);
			$request->setObject('ValuePaid'		, $NValuePaid);
			$request->setObject('ValueCollect'	, $NValueCollect);
			$request->setObject('ValueNew'		, $NValueNew);
		}
	}
?>