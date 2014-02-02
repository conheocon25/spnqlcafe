<?php		
	namespace MVC\Command;	
	class PayRoll extends Command {
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
			$mEmployee 	= new \MVC\Mapper\Employee();
			$mConfig 	= new \MVC\Mapper\Config();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$EmployeeAll 	= $mEmployee->findAll();
			$TrackAll 		= $mTracking->findAll();
			$ConfigName		= $mConfig->findByName("NAME");
			
			if (!isset($IdTrack)){
				$Track = $TrackAll->current();
				$IdTrack = $Track->getId();
			}else{
				$Track = $mTracking->find($IdTrack);
			}
			
			$Title = "CHẤM CÔNG";
			$Navigation = array();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setProperty('Title', 		$Title);
			$request->setObject('TrackAll', 	$TrackAll);
			$request->setObject('EmployeeAll', 	$EmployeeAll);
			$request->setObject('Track', 		$Track);
			$request->setObject('ConfigName', 	$ConfigName);
			$request->setObject('Navigation', 	$Navigation);
		}
	}
?>