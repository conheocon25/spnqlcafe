<?php		
	namespace MVC\Command;	
	class ReportLogExe extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			$IdTrack 	= $request->getProperty('IdTrack');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mDomain 	= new \MVC\Mapper\Domain();
			$mTracking 	= new \MVC\Mapper\Tracking();
			$mTableLog 	= new \MVC\Mapper\TableLog();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Tracking 	= $mTracking->find($IdTrack);
			$TDAll 		= $Tracking->getDailyAll();
			$DomainAll	= $mDomain->findAll();
			
			$Name 		= $Tracking->getPathFileLog();
			$Handle 	= fopen($Name, 'w') or die('Khong the mo:  '.$Name);
			$Data		= "";
			
			if ($Tracking->isCurrent()==true){
				$json = array('result' => "OK2");
				echo json_encode($json);
				return self::statuses('CMD_DEFAULT');
			}
			
			$LogAllTemp = $mTableLog->findByTracking(array($Tracking->getDateStart(), $Tracking->getDateEnd()));
			if ($LogAllTemp->count()==0){
				$json = array('result' => "OK1");
				echo json_encode($json);
				return self::statuses('CMD_DEFAULT');
			}
			
			while ($TDAll->valid()){
				$TD 	= $TDAll->current();
				$Data 	.= "CHI TIẾT NGÀY ".$TD->getDatePrint()." \n";
				
				$DomainAll->rewind();
				while($DomainAll->valid()){
					$Domain 	= $DomainAll->current();
										
					$TableAll 	= $Domain->getTableAll();
					$TableAll->rewind();
					while ($TableAll->valid()){
						$Table 	= $TableAll->current();
						$LogAll = $mTableLog->findBy(array($Table->getId(), $TD->getDate()));
						$LogAll->rewind();
						if ($LogAll->count()>0){
							$Data 	.= "\t".$Table->getName()." \n";
							while ($LogAll->valid() ){								
								$Log = $LogAll->current();
								$Data .= "\t\t".$Log->getDateTime()."-".$Log->getNote()." \n";
								$LogAll->next();
							}							
						}
						$TableAll->next();
					}
					$DomainAll->next();
				}				
				$TDAll->next();		
			}									
			fwrite($Handle, $Data);
			fclose($Handle);
			
			//Xóa trong CSDL
			$mTableLog->deleteByTracking(array($Tracking->getDateStart(), $Tracking->getDateEnd()));
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$json = array('result' => "OK");
			echo json_encode($json);
		}
	}
?>