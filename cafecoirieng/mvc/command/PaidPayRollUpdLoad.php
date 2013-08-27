<?php		
	namespace MVC\Command;	
	class PaidPayRollUpdLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdEmployee = $request->getProperty("IdEmployee");
			$IdPaid = $request->getProperty("IdPaid");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------					
			$mPPR = new \MVC\Mapper\PaidPayRoll();
			$mEmployee = new \MVC\Mapper\Employee();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Employee = $mEmployee->find($IdEmployee);
			$PPR = $mPPR->find($IdPaid);			
			$Title = mb_strtoupper("CHI PHÍ / ".$Employee->getName()."/".$PPR->getDatePrint()." / CẬP NHẬT", 'UTF8');
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty('Title', $Title);
			$request->setProperty('URLHeader', $Employee->getURLPPR());
			
			$request->setObject('PPR', $PPR);			
		}
	}
?>