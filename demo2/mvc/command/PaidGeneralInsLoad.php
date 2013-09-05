<?php		
	namespace MVC\Command;	
	class PaidGeneralInsLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdTerm = $request->getProperty('IdTerm');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mTerm = new \MVC\Mapper\TermPaid();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Term = $mTerm->find($IdTerm);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Term', $Term);
			$request->setProperty('URLHeader', $Term->getURLDetail() );
			$request->setProperty('Title', "CHI PHÍ / ".mb_strtoupper($Term->getName(), 'UTF8')." / THÊM");
		}
	}
?>