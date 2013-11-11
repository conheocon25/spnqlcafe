<?php		
	namespace MVC\Command;	
	class ReportPaidGeneral extends Command{
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
			$mTracking = new \MVC\Mapper\Tracking();
			$mPaid = new \MVC\Mapper\PaidGeneral();
			$mTerm = new \MVC\Mapper\TermPaid();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Tracking = $mTracking->find($IdTrack);			
			$TermAll = $mTerm->findAll();
			$Title = "TỔNG HỢP CHI THÁNG ".\date("m", strtotime($Tracking->getDateStart()))."/".\date("Y", strtotime($Tracking->getDateStart()));
			$DateCurrent = "Vĩnh Long, ngày ".\date("d")." tháng ".\date("m")." năm ".\date("Y");
			
			if ($Save == "yes"){			
				$Value = $Tracking->getPaidAllSumValue();
				$Tracking->setPaidGeneral($Value);
				
				$Value = $Tracking->getPaidPayRollAllValueReal();
				$Tracking->setPaidPayRoll($Value);
				
				$Value = $Tracking->getOrderAllSumValue();
				$Tracking->setPaidImport($Value);
				
				$mTracking->update($Tracking);
			}
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('Title', $Title);
			$request->setProperty('DateCurrent', $DateCurrent);
			$request->setObject('Tracking', $Tracking);
			$request->setObject('TermAll', $TermAll);
		}
	}
?>