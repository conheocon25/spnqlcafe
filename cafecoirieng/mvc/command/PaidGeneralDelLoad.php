<?php		
	namespace MVC\Command;	
	class PaidGeneralDelLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdTerm = $request->getProperty("IdTerm");
			$IdPaid = $request->getProperty("IdPaid");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mTerm = new \MVC\Mapper\TermPaid();			
			$mPaid = new \MVC\Mapper\PaidGeneral();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Term = $mTerm->find($IdTerm);
			$Paid = $mPaid->find($IdPaid);			
			$Title = "CHI PHÍ / ".$Paid->getDatePrint()." / CẬP NHẬT";
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty('Title', $Title);			
			$request->setObject('Paid', $Paid);
			$request->setProperty('URLHeader', $Term->getURLDetail() );
		}
	}
?>