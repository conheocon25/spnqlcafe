<?php		
	namespace MVC\Command;	
	class SellingTableLoad extends Command {
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
									
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Table 				= $mTable->find($IdTable);
			$TableAll 			= $mTable->findAll();
			$TableAllNonGuest	= $mTable->findAllNonGuest(array());
			$TableAllGuest		= $mTable->findAllGuest(array($IdTable));
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setObject('Table'				, $Table);
			$request->setObject('TableAll'			, $TableAll);
			$request->setObject('TableAllNonGuest'	, $TableAllNonGuest);
			$request->setObject('TableAllGuest'		, $TableAllGuest);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>