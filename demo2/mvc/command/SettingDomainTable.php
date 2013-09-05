<?php
	namespace MVC\Command;	
	class SettingDomainTable extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$IdDomain = $request->getProperty('IdDomain');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mDomain = new \MVC\Mapper\Domain();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$Domain = $mDomain->find($IdDomain);
			$DomainAll = $mDomain->findAll();
			
			$Title = mb_strtoupper($Domain->getName(), 'UTF8');
			$Navigation = array(
				array("ỨNG DỤNG", "/app"),
				array("THIẾT LẬP", "/setting"),
				array("KHU VỰC", "/setting/domain")
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setProperty("Title", $Title);
			
			$request->setObject("Navigation", $Navigation);
			$request->setObject("Domain", $Domain);
			$request->setObject("DomainAll", $DomainAll);
		}
	}
?>
