<?php		
	namespace MVC\Command;	
	class Selling extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
									
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mDomain 	= new \MVC\Mapper\Domain();
			$mCategory 	= new \MVC\Mapper\Category();
			$mSD 		= new \MVC\Mapper\SessionDetail();
			$mConfig	= new \MVC\Mapper\Config();
			$mUnit 		= new \MVC\Mapper\Unit();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$DomainAll 		= $mDomain->findAll();
			$CategoryAll 	= $mCategory->findAll();
			$UnitAll		= $mUnit->findAll();
			$Domain			= $DomainAll->current();
			$Config			= $mConfig->findByName("CATEGORY_AUTO");
			$ConfigSwitchBoardCall	= $mConfig->findByName("SWITCH_BOARD_CALL");
			$Top10			= $mSD->findByTop10(array());
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$Title = "BÁN HÀNG";
			$Navigation = array();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setProperty('Title'		, $Title);
			$request->setObject('Navigation'	, $Navigation);
			$request->setObject('Domain'		, $Domain);
			$request->setObject('DomainAll'		, $DomainAll);
			$request->setObject('UnitAll'		, $UnitAll);
			$request->setObject('CategoryAll'	, $CategoryAll);
			$request->setObject('Top10'			, $Top10);
			$request->setObject('Config'		, $Config);
			$request->setObject('ConfigSwitchBoardCall'		, $ConfigSwitchBoardCall);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>