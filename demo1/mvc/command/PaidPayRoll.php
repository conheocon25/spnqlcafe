<?php		
	namespace MVC\Command;	
	class PaidPayRoll extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mEmployee = new \MVC\Mapper\Employee();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$EmployeeAll = $mEmployee->findAll();
			$EmployeeAll1 = $mEmployee->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('EmployeeAll', $EmployeeAll);
			$request->setObject('EmployeeAll1', $EmployeeAll1);
			$request->setProperty('URLHeader', "/app");

		}
	}
?>