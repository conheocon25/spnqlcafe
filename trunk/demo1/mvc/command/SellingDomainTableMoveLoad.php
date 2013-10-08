<?php
	namespace MVC\Command;
	class SellingDomainTableMoveLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdDomain = $request->getProperty("IdDomain");
			$IdTable = $request->getProperty("IdTable");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mDomain 	= new \MVC\Mapper\Domain();
			$mTable 	= new \MVC\Mapper\Table();
			$mSession 	= new \MVC\Mapper\Session();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Domain = $mDomain->find($IdDomain);
			$Table = $mTable->find($IdTable);
						
			$TableAll = $mTable->findAllNonGuest(array());
									
			$Title = mb_strtoupper($Table->getName(), 'UTF8')." DI CHUYỂN ĐẾN";
			$Navigation = array(
				array("BÁN HÀNG", "/selling"),
				array(mb_strtoupper($Domain->getName(), 'UTF8'), $Domain->getURLSelling())
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject('Table'		, $Table);
			$request->setObject('TableAll'	, $TableAll);
			$request->setObject('Navigation', $Navigation);
			$request->setProperty('Title'	, $Title);
		}
	}
?>