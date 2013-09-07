<?php		
	namespace MVC\Command;	
	class ReportPayRollDetail extends Command {
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
			$IdEmployee = $request->getProperty('IdEmployee');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mEmployee = new \MVC\Mapper\Employee();
			$mTracking = new \MVC\Mapper\Tracking();
			$mPR = new \MVC\Mapper\PayRoll();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Employee = $mEmployee->find($IdEmployee);
			$Tracking = $mTracking->find($IdTrack);
			$PRAll = $mPR->findByTracking(array($IdEmployee, $Tracking->getDateStart(), $Tracking->getDateEnd()));
			
			$Title = "LƯƠNG ".$Tracking->getName()." - ".mb_strtoupper($Employee->getName(), 'UTF8');			
			$DateCurrent = "Vĩnh Long, ngày ".\date("d")." tháng ".\date("m")." năm ".\date("Y");
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setProperty('Title', $Title);
			$request->setProperty('DateCurrent', $DateCurrent);
			$request->setObject('PRAll', $PRAll);
		}
	}
?>