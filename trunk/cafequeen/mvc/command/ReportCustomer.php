<?php		
	namespace MVC\Command;	
	class ReportCustomer extends Command{
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
			$mCustomer = new \MVC\Mapper\Customer();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Tracking = $mTracking->find($IdTrack);
			$CustomerAll = $mCustomer->findAll();
			
			$Data = array();
			$SDebtOld = 0;
			$SDebtCurrent = 0;
			$SCollectCurrent = 0;
			$SDebtNew = 0;
			
			while($CustomerAll->valid()){
				$Customer 		= $CustomerAll->current();
				//Trừ khách vãng lai
				if ($Customer->getId() != 1){
					$DebtOld 		= $Tracking->getCustomerOldDebt( $Customer->getId() );
					$DebtOldP 		= $Tracking->getCustomerOldDebtPrint( $Customer->getId() );
					$DebtCurrent	= $Tracking->getCustomerDebtSessionAllValue( $Customer->getId() );
					$DebtCurrentP	= $Tracking->getCustomerDebtSessionAllValuePrint( $Customer->getId() );
					$CollectCurrent	= $Tracking->getCustomerCollectAllValue( $Customer->getId() );
					$CollectCurrentP	= $Tracking->getCustomerCollectAllValuePrint( $Customer->getId() );
					$DebtNew 		= $Tracking->getCustomerNewDebt( $Customer->getId() );
					$DebtNewP		= $Tracking->getCustomerNewDebtPrint( $Customer->getId() );
					
					$SDebtOld			+= $DebtOld;
					$SDebtCurrent		+= $DebtCurrent;
					$SCollectCurrent	+= $CollectCurrent;
					$SDebtNew			+= $DebtNew;
					
					$Data[] 	= array($Customer->getName(), $Tracking->getURLCustomerDetail($Customer->getId()), $DebtOldP, $DebtCurrentP, $CollectCurrentP, $DebtNewP);
				}
				$CustomerAll->next();
			}
						
			$Title = "BẢNG CÔNG NỢ KHÁCH HÀNG";
			$Navigation = array(				
				array("BÁO CÁO", "/report"),
				array($Tracking->getName(), $Tracking->getURLView() )
			);
			
			$NSDebtOld 		= 	new \MVC\Library\Number($SDebtOld);
			$NSDebtCurrent 	= 	new \MVC\Library\Number($SDebtCurrent);
			$NSCollectCurrent 	= 	new \MVC\Library\Number($SCollectCurrent);
			$NSDebtNew 		= 	new \MVC\Library\Number($SDebtNew);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('Title', $Title);
			$request->setObject('Data', $Data);
			$request->setObject('Tracking', $Tracking);
			$request->setObject('Navigation', $Navigation);
			$request->setObject('CustomerAll', $CustomerAll);
			$request->setProperty('SDebtOld', $NSDebtOld->formatCurrency() );
			$request->setProperty('SDebtCurrent', $NSDebtCurrent->formatCurrency() );
			$request->setProperty('SCollectCurrent', $NSCollectCurrent->formatCurrency() );
			$request->setProperty('SDebtNew', $NSDebtNew->formatCurrency() );
		}
	}
?>