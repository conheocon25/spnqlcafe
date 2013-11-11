<?php
	namespace MVC\Command;
	class SellingDomainTableLogDetail extends Command{
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
			$IdSession = $request->getProperty("IdSession");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mSession = new \MVC\Mapper\Session();
			$mDomain = new \MVC\Mapper\Domain();
			$mTable = new \MVC\Mapper\Table();
			$mCustomer = new \MVC\Mapper\Customer();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Session = $mSession->find($IdSession);
			$Domain = $mDomain->find($IdDomain);
			$Table = $mTable->find($IdTable);
			$CustomerAll = $mCustomer->findAll();
			
			$Title = $Session->getDateTimePrint();
			$Navigation = array(				
				array("BÁN HÀNG", "/selling"),
				array(mb_strtoupper($Domain->getName(), 'UTF8'), $Domain->getURLSelling()),
				array(mb_strtoupper($Table->getName(), 'UTF8'), $Domain->getURLSelling()),
				array("SỔ", $Table->getURLLog())
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject("Session", $Session);			
			$request->setObject("CustomerAll", $CustomerAll);
			$request->setProperty('Title', $Title);
			$request->setObject("Navigation", $Navigation);
		}
	}
?>
