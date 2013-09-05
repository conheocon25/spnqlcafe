<?php		
	namespace MVC\Command;	
	class CollectCustomer extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdCustomer = $request->getProperty('IdCustomer');
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCustomer = new \MVC\Mapper\Customer();
			$mCollect = new \MVC\Mapper\CollectCustomer();
			$mConfig = new \MVC\Mapper\Config();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Customer = $mCustomer->find($IdCustomer);
			$Config = $mConfig->findByName('ROW_PER_PAGE');
			if (!isset($Page)) $Page = 1;
			$CollectAll = $mCollect->findByPage(array($IdCustomer, $Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation( $Customer->getCollectAll()->count(), $Config->getValue(), $Customer->getURLCollect());
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('PN', $PN);
			$request->setObject('Customer', $Customer);
			$request->setObject('CollectAll', $CollectAll);
			
			$request->setProperty('URLHeader', "/app");
			$request->setProperty('Page', $Page);

		}
	}
?>