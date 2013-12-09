<?php		
	namespace MVC\Command;	
	class SellingBetaLoadTable extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdTable = $request->getProperty("IdTable");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mTable 	= new \MVC\Mapper\Table();
			$mCustomer 	= new \MVC\Mapper\Customer();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Table 			= $mTable->find($IdTable);
			$CustomerAll 	= $mCustomer->findAll();
												
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setObject('Table'			, $Table);
			$request->setObject('CustomerAll'	, $CustomerAll);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>