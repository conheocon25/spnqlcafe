<?php
	namespace MVC\Command;
	class SellingDomain extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdDomain = $request->getProperty('IdDomain');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mDomain = new \MVC\Mapper\Domain();
			$mTable = new \MVC\Mapper\Table();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$DomainAll = $mDomain->findAll();
			$Domain = $mDomain->find($IdDomain);
			
			if (!isset($IdDomain))
				$Domain = $DomainAll->current();				
			
			$TableAll1 = $mTable->findAllGuest(null);
			$TableAll2 = $mTable->findAllNonGuest(null);
														
			$Title = mb_strtoupper($Domain->getName(), 'UTF8');
			$Navigation = array(
				array("ỨNG DỤNG", "/app"),
				array("BÁN HÀNG", "/selling")
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('Title', $Title);
			$request->setObject("Navigation", $Navigation);
			
			$request->setObject("Domain", $Domain);
			$request->setObject("DomainAll", $DomainAll);
			$request->setObject("TableAll1", $TableAll1);
			$request->setObject("TableAll2", $TableAll2);
			
		}
	}
?>