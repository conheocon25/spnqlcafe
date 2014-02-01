<?php		
	namespace MVC\Command;	
	class PayRollWork extends Command {
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
			$mTracking = new \MVC\Mapper\Tracking();
			$mEmployee = new \MVC\Mapper\Employee();
			$mConfig = new \MVC\Mapper\Config();
			$mPR = new \MVC\Mapper\PayRoll();			
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Track 		= $mTracking->find($IdTrack);			
			$Employee  	= $mEmployee->find($IdEmployee);
						
			$Title = mb_strtoupper($Employee->getName(), 'UTF8');
			$Navigation = array(				
				array("CHẤM CÔNG", $Track->getURLPayRoll() )
			);								
			$PRAll = $mPR->findByTracking(array($IdEmployee, $Track->getDateStart(), $Track->getDateEnd()));
			
			//Nếu chưa có thì phát sinh ra 30 ngày lương rỗng
			if ($PRAll->count()==0){				
				$Date 		= $Track->getDateStart();
				$EndDate 	= $Track->getDateEnd();								
				while (strtotime($Date) <= strtotime($EndDate)){
					$PR = new \MVC\Domain\PayRoll(
						null,
						$IdEmployee, 
						$Date, 
						0, 
						0, 
						0, 
						0, 
						0
					);
					$mPR->insert($PR);
					$Date = \date("Y-m-d", strtotime("+1 day", strtotime($Date)));
				}
			}			
			$PRAll = $mPR->findByTracking(array($IdEmployee, $Track->getDateStart(), $Track->getDateEnd()));
			
			$Value 		= 0;
			$Session1 	= 0;
			$Session2 	= 0;
			$Session3 	= 0;
			$Extra 		= 0;
			$Late 		= 0;
			
			while ($PRAll->valid()){
				$PR 		= $PRAll->current();
				$Value 		+= $PR->getValue();
				$Session1 	+= $PR->getSession1();
				$Session2 	+= $PR->getSession2();
				$Session3 	+= $PR->getSession3();
				$Extra 		+= $PR->getExtra();
				$Late 		+= $PR->getLate();
				
				$PRAll->next();
			}
			$NValue 	= new \MVC\Library\Number($Value);
			$NSession1 	= new \MVC\Library\Number($Session1);
			$NSession2 	= new \MVC\Library\Number($Session2);
			$NSession3 	= new \MVC\Library\Number($Session3);
			$NExtra 	= new \MVC\Library\Number($Extra);
			$NLate 		= new \MVC\Library\Number($Late);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setProperty('Title'	, $Title);			
			$request->setObject('Navigation', $Navigation);
			$request->setObject('Track'		, $Track);
			$request->setObject('Employee'	, $Employee);
			$request->setObject('PRAll'		, $PRAll);
			
			$request->setObject('NValue'	, $NValue);
			$request->setObject('NSession1'	, $NSession1);
			$request->setObject('NSession2'	, $NSession2);
			$request->setObject('NSession3'	, $NSession3);
			$request->setObject('NExtra'	, $NExtra);
			$request->setObject('NLate'		, $NLate);
		}
	}
?>