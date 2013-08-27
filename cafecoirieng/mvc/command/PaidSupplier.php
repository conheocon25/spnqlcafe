<?php		
	namespace MVC\Command;	
	class PaidSupplier extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdSupplier = $request->getProperty('IdSupplier');
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mSupplier = new \MVC\Mapper\Supplier();
			$mPaidSupplier = new \MVC\Mapper\PaidSupplier();
			$mConfig = new \MVC\Mapper\Config();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Supplier = $mSupplier->find($IdSupplier);
			$Config = $mConfig->findByName('ROW_PER_PAGE');
			if (!isset($Page)) $Page = 1;
			$PaidAll = $mPaidSupplier->findByPage(array($IdSupplier, $Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation( $Supplier->getPaids()->count(), $Config->getValue(), $Supplier->getURLPaid());
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('PN', $PN);
			$request->setObject('PaidAll', $PaidAll);
			$request->setObject('Supplier', $Supplier);
			$request->setProperty('Page', $Page);
			$request->setProperty('URLHeader', "/app");
			$request->setProperty('Title', "CÁC KHOẢN CHI / NHÀ CUNG CẤP / ".$Supplier->getName() );			
		}
	}
?>