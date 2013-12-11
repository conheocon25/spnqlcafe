<?php
	namespace MVC\Command;
	class SellingTablePrint extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			//$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdDomain = $request->getProperty("IdDomain");
			$IdTable = $request->getProperty("IdTable");
			$IdSession = $request->getProperty("IdSession");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mDomain = new \MVC\Mapper\Domain();
			$mTable = new \MVC\Mapper\Table();
			$mTableLog = new \MVC\Mapper\TableLog();
			$mSession = new \MVC\Mapper\Session();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Table = $mTable->find($IdTable);
			$Domain = $mDomain->find($IdDomain);
			$Session = $mSession->find($IdSession);
			
			$Session->setNote("In phieu");			
			$mSession->update($Session);
			
			$Log = new \MVC\Domain\TableLog(
				null,
				@\MVC\Base\SessionRegistry::getCurrentIdUser(),
				$Session->getIdTable(),
				date('Y-m-d H:i:s'),
				"In phiếu ".$Session->getValuePrint()
			);
			$mTableLog->insert($Log);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject("Table", $Table);
			$request->setObject("Domain", $Domain);
			$request->setObject("Session", $Session);
		}
	}
?>
