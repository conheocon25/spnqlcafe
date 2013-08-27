<?php		
	namespace MVC\Command;	
	class PaidPayRollDelLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdPaid = $request->getProperty("IdPaid");
			$IdEmployee = $request->getProperty("IdEmployee");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mEmployee = new \MVC\Mapper\Employee();
			$mPPR = new \MVC\Mapper\PaidPayRoll();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Employee = $mEmployee->find($IdEmployee);
			$PPR = $mPPR->find($IdPaid);
			$Title = mb_strtoupper("CHI PHÍ / LƯƠNG ".$Employee->getName()." / ".$PPR->getDatePrint()." / XÓA", 'UTF8');
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty('Title', $Title);
			$request->setProperty('URLHeader', $Employee->getURLPaid());
			$request->setObject('PPR', $PPR);
		}
	}
?>