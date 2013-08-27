<?php		
	namespace MVC\Command;	
	class CollectGeneral extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			$IdTerm = $request->getProperty('IdTerm');
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mConfig = new \MVC\Mapper\Config();
			$mTermCollect = new \MVC\Mapper\TermCollect();
			$mCollect = new \MVC\Mapper\CollectGeneral();
												
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Term = $mTermCollect->find($IdTerm);
			$Config = $mConfig->findByName('ROW_PER_PAGE');
			if (!isset($Page)) $Page = 1;
			$CollectAll = $mCollect->findByPage(array($IdTerm, $Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation( $Term->getCollectAll()->count(), $Config->getValue(), $Term->getURLCollect());
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Term', $Term);
			$request->setObject('PN', $PN);
			$request->setObject('CollectAll', $CollectAll);
						
			$request->setProperty('URLHeader', "/app");
			$request->setProperty('Title', "KHOẢN THU / ".$Term->getName() );
			$request->setProperty('Page', $Page);
		}
	}
?>