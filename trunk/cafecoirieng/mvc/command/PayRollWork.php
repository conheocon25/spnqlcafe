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
			$Track = $mTracking->find($IdTrack);			
			$Employee  = $mEmployee->find($IdEmployee);
						
			$Title = mb_strtoupper($Employee->getName(), 'UTF8');
			$Navigation = array(
				array("ỨNG DỤNG", "/app"),
				array("CHẤM CÔNG", $Track->getURLPayRoll() )
			);
			$URLBase = $Track->getURLPayRoll()."/".$Employee->getId();
			
			//Tính luôn lương
			$Config5Minutes = $mConfig->findByName('EVERY_5_MINUTES');
			$Employee = $mEmployee->find($IdEmployee);
			$DayValue = $Employee->getSalaryBase()/30;
						
			$PRAll = $mPR->findByTracking(array($IdEmployee, $Track->getDateStart(), $Track->getDateEnd()));
			
			$Extra = 0;
			$Late = 0;
			$Absent = 0;
			$Yes = 0;
			while ($PRAll->valid()){
				$PR = $PRAll->current();
				$Extra += $PR->getExtra();
				$Absent += $PR->getState()==0?1:0;
				$Yes += $PR->getState()==1?1:0;
				$Late += $PR->getLate();
				$PRAll->next();
			}
			
			//Tính thời gian trễ
			$LateValue = ($Late/5)*$Config5Minutes->getValue();
			$NLateValue = new \MVC\Library\Number($LateValue);
			
			//Tính làm thêm
			$ExtraValue = $Extra*$Employee->getSalaryBaseH();
			$NExtraValue = new \MVC\Library\Number($ExtraValue);
			
			//Làm chính thức
			$YesValue = $Yes*$Employee->getSalaryBaseD();
			$NYesValue = new \MVC\Library\Number($YesValue);
			
			//Tính nghỉ ca
			$AbsentValue = $Absent*$DayValue;
			$NAbsentValue = new \MVC\Library\Number($AbsentValue);
			
			//Tổng lương
			$Salary = $YesValue + $ExtraValue - $LateValue;
			$NSalary = new \MVC\Library\Number($Salary);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setProperty('Title', $Title);
			$request->setProperty('URLBase', $URLBase);
			$request->setObject('Navigation', $Navigation);
			$request->setObject('Track', $Track);
			$request->setObject('Employee', $Employee);
			
			$request->setProperty('Config5Minutes', $Config5Minutes->getValue());
			$request->setProperty('Extra', $Extra);
			$request->setProperty('ExtraValue', $NExtraValue->formatCurrency() );
			$request->setProperty('Yes', $Yes);
			$request->setProperty('YesValue', $NYesValue->formatCurrency() );
			$request->setProperty('Absent', $Absent);
			$request->setProperty('AbsentValue', $NAbsentValue->formatCurrency() );
			$request->setProperty('Late', $Late);
			$request->setProperty('LateValue', $NLateValue->formatCurrency() );
			$request->setProperty('Salary', $NSalary->formatCurrency() );
		}
	}
?>