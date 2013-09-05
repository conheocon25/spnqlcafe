<?php		
	namespace MVC\Command;	
	class ReportSellingGeneral extends Command{
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
			$mTracking = new \MVC\Mapper\Tracking();			
			$mSession = new \MVC\Mapper\Session();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Tracking = $mTracking->find($IdTrack);
			
			$ChartData = array();
			$Date = $Tracking->getDateStart();
			$EndDate = $Tracking->getDateEnd();
			$Sum = 0;
					
			while (strtotime($Date) <= strtotime($EndDate)){
				$Date1 = \date("Y-m-d", strtotime($Date))." 06:00:00";
				$Date2 = \date("Y-m-d", strtotime($Date))." 22:59:59";
				$Sessions = $mSession->findByTracking( array($Date1, $Date2) );
				$Value = 0;
				
				while($Sessions->valid()){
					$Session = $Sessions->current();										
					$Value += ($Session->getStatus()==1?$Session->getValue():0);
					$Sessions->next();
				}
				//Định dạng lại gọn				
				$N = new \MVC\Library\Number($Value);
				$ChartData[] = array(
					\date("d/m", strtotime($Date)), 					
					$N->formatCurrency()." đ"
				);
				$Date = \date("Y-m-d", strtotime("+1 day", strtotime($Date)));
				$Sum += $Value;
			}			
			$NSum = new \MVC\Library\Number($Sum);
			$Title = "DOANH THU THÁNG ".\date("m/Y", strtotime($EndDate));
			$DateCurrent = "Vĩnh Long, ngày ".\date("d")." tháng ".\date("m")." năm ".\date("Y");
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject('ChartData', $ChartData);			
			$request->setProperty('Title', $Title);
			$request->setProperty('DateCurrent', $DateCurrent);			
			$request->setProperty('Sum', $NSum->formatCurrency()." đ");
		}
	}
?>