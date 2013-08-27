<?php
	namespace MVC\Command;	
	class SettingUnit extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$DomainAll = $mDomain->findAll();
			$CategoryAll = $mCategory->findAll();
			$SupplierAll = $mSupplier->findAll();			
			$UnitAll = $mUnit->findAll();			
			$CustomerAll = $mCustomer->findAll();			
			$UserAll = $mUser->findAll();
			$TermPaidAll = $mTermPaid->findAll();
			$TermCollectAll = $mTermCollect->findAll();
			$ConfigAll = $mConfig->findAll();
			
			$Title = "ĐƠN VỊ TÍNH";
			$Navigation = array(
				array("ỨNG DỤNG", "/app"),
				array("THIẾT LẬP", "/setting")
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveAdmin", "Unit");
			$request->setObject("Navigation", $Navigation);
						
			$request->setObject('DomainAll', $DomainAll);
			$request->setObject('CategoryAll', $CategoryAll);
			$request->setObject('SupplierAll', $SupplierAll);
			$request->setObject('UnitAll', $UnitAll);			
			$request->setObject('CustomerAll', $CustomerAll);			
			$request->setObject('UserAll', $UserAll);
			$request->setObject('TermPaidAll', $TermPaidAll);
			$request->setObject('TermCollectAll', $TermCollectAll);
			$request->setObject('ConfigAll', $ConfigAll);
		}
	}
?>
