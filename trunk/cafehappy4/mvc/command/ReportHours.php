<?php		
	namespace MVC\Command;	
	class ReportHours extends Command{
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
			$mTable = new \MVC\Mapper\Table();
			$mSession = new \MVC\Mapper\Session();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Tracking = $mTracking->find($IdTrack);
			$TableNormalAll = $mTable->findByType(array(0));
			$Date1 = \date("Y-m-d", strtotime($Tracking->getDateStart()))." 8:0:0";
			$Date2 = \date("Y-m-d", strtotime("+1 day", strtotime($Tracking->getDateEnd())))." 7:59:59";
			
			$NormalData = array();
			$NormalCountTicket 	= 0;
			$NormalCountHour 	= 0;
			$NormalValue 		= 0;
			while ($TableNormalAll->valid()){
				$Table = $TableNormalAll->current();
				$SessionAll = $mSession->findByTableTracking(array($Table->getId(),$Date1,$Date2));
				$SessionAll->rewind();
				$CountTicket = 0;
				$CountHour = 0.0;
				$Value = 0.0;
				while($SessionAll->valid()){
					$Session = $SessionAll->current();
					$CountTicket ++;
					$CountHour 	+= $Session->getHoursReal();
					$Value 		+= $Session->getValue();
					$SessionAll->next();
				}
				$NormalCountTicket 	+= $CountTicket;
				$NormalCountHour 	+= $CountHour;
				$NormalValue 		+= $Value;
				
				$NValue = new \MVC\Library\Number($Value);
				$NormalData[] = array($Table->getName(), $CountTicket, $CountHour, $NValue->formatCurrency() );
				$TableNormalAll->next();		
			}
			
			$TableVIPAll = $mTable->findByType(array(1));
			$VIPData = array();
			$VIPCountTicket = 0;
			$VIPCountHour = 0;
			$VIPValue = 0;
			while ($TableVIPAll->valid()){
				$Table = $TableVIPAll->current();
				$SessionAll = $mSession->findByTableTracking(array($Table->getId(),$Date1,$Date2));
				$SessionAll->rewind();
				$CountTicket = 0;
				$CountHour = 0.0;
				$Value = 0.0;
				while($SessionAll->valid()){
					$Session = $SessionAll->current();
					$CountTicket ++;
					$CountHour 	+= $Session->getHoursReal();
					$Value 		+= $Session->getValue();
					$SessionAll->next();
				}
				$VIPCountTicket 	+= $CountTicket;
				$VIPCountHour 		+= $CountHour;
				$VIPValue 			+= $Value;
				
				$NValue = new \MVC\Library\Number($Value);
				$VIPData[] = array($Table->getName(), $CountTicket, $CountHour, $NValue->formatCurrency() );
				$TableVIPAll->next();
			}
			
			$Title = "THỐNG KÊ GIỜ HÁT ".\date("m/Y", strtotime( $Tracking->getDateStart() ));
									
			$NNormalValue 	= new \MVC\Library\Number($NormalValue);
			$NVIPValue 		= new \MVC\Library\Number($VIPValue);
						
			$SUMValue		= $VIPValue + $NormalValue;
			$NSUMValue 		= new \MVC\Library\Number($SUMValue);
			$SUMCountTicket	= $VIPCountTicket + $NormalCountTicket;			
			$SUMCountHour	= $VIPCountHour + $NormalCountHour;
			
			$NormalRateValue = round(($NormalValue/$SUMValue)*100, 1);
			$VIPRateValue 	= round(($VIPValue/$SUMValue)*100, 1);
			
			$NormalRateTicket = round(($NormalCountTicket/$SUMCountTicket)*100, 1);
			$VIPRateTicket 	= round(($VIPCountTicket/$SUMCountTicket)*100, 1);
			
			$NormalRateHour = round(($NormalCountHour/$SUMCountHour)*100, 1);
			$VIPRateHour 	= round(($VIPCountHour/$SUMCountHour)*100, 1);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('Title', $Title);
						
			$request->setObject('NormalData'		, $NormalData);			
			$request->setProperty('NormalCountHour'	, $NormalCountHour);			
			$request->setProperty('NormalRateHour'	, $NormalRateHour);			
			$request->setProperty('NormalCountTicket', $NormalCountTicket);
			$request->setProperty('NormalRateTicket', $NormalRateTicket);
			$request->setProperty('NormalValue'		, $NNormalValue->formatCurrency());
			$request->setProperty('NormalRateValue'	, $NormalRateValue);
			
			$request->setObject('VIPData'			, $VIPData);
			$request->setProperty('VIPCountHour'	, $VIPCountHour);			
			$request->setProperty('VIPRateHour'		, $VIPRateHour);			
			$request->setProperty('VIPCountTicket'	, $VIPCountTicket);
			$request->setProperty('VIPRateTicket'	, $VIPRateTicket);
			$request->setProperty('VIPValue'		, $NVIPValue->formatCurrency());
			$request->setProperty('VIPRateValue'	, $VIPRateValue);
			
			$request->setProperty('SUMValue'		, $NSUMValue->formatCurrency());
			$request->setProperty('SUMCountTicket'	, $SUMCountTicket);
			$request->setProperty('SUMCountHour'	, $SUMCountHour);
		}
	}
?>