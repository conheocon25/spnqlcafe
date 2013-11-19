<?php		
	namespace MVC\Command;	
	class ReportCollectGeneral extends Command{
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
			$mCollect = new \MVC\Mapper\CollectGeneral();
			$mTerm = new \MVC\Mapper\TermCollect();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Tracking = $mTracking->find($IdTrack);
			$TermAll = $mTerm->findAll();
			$Title = "TỔNG HỢP THU THÁNG ".\date("m", strtotime($Tracking->getDateStart()))."/".\date("Y", strtotime($Tracking->getDateStart()));
			$DateCurrent = "Vĩnh Long, ngày ".\date("d")." tháng ".\date("m")." năm ".\date("Y");
			
			//lưu TỔNG HỢP KHOẢN THU vào DB
			if ($Save == "yes"){
				$Value = $Tracking->getCollectAllSumValue();
				$Tracking->setCollectGeneral($Value);
				
				$Value = $Tracking->getCustomerCollectGeneralValue();
				$Tracking->setCollectCustomer($Value);
				
				$Value = $Tracking->getSessionAllValue2();
				$Tracking->setCollectSellingDebt($Value);
				
				$Value = $Tracking->getSessionAllValue1();
				$Tracking->setCollectSellingNoDebt($Value);
				
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