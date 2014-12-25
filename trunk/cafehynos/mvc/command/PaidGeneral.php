<?php		
	namespace MVC\Command;	
	class PaidGeneral extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdTerm = $request->getProperty('IdTerm');
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mTerm = new \MVC\Mapper\TermPaid();
			$mPaidGeneral = new \MVC\Mapper\PaidGeneral();
			$mConfig = new \MVC\Mapper\Config();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Term = $mTerm->find($IdTerm);
			$Config = $mConfig->findByName('ROW_PER_PAGE');
			if (!isset($Page)) $Page = 1;
			$PaidAll = $mPaidGeneral->findByPage(array($IdTerm, $Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation( $Term->getPaids()->count(), $Config->getValue(), $Term->getURLDetail());
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Term', $Term);
			$request->setObject('PaidAll', $PaidAll);
			$request->setObject('PN', $PN);
			$request->setProperty('Title', "KHOẢN CHI / ".$Term->getName());
			$request->setProperty('URLHeader', "/app");
			$request->setProperty('Page', $Page);
			
		}
	}
?>