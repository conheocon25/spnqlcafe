<?php		
	namespace MVC\Command;	
	class SettingConfig extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$ConfigAll 		= $mConfig->findAll();
			$CategoryAll 	= $mCategory->findAll();
			
			$Title = "CẤU HÌNH";
			$Navigation = array(				
				array("THIẾT LẬP", "/setting")
			);
			
			//Kiểm tra nếu chưa tồn tại trong DB thì sẽ tự động khởi tạo giá trị mặc định và lưu vào DB
			$RowPerPage 			= $mConfig->findByName("ROW_PER_PAGE");
			if ($RowPerPage==null){
				$RowPerPage = new \MVC\Domain\Config(null, 'ROW_PER_PAGE', 12);
				$mConfig->insert($RowPerPage);
			}
			
			$Every5Minutes 			= $mConfig->findByName("EVERY_5_MINUTES");
			if ($Every5Minutes==null){
				$Every5Minutes = new \MVC\Domain\Config(null, 'EVERY_5_MINUTES', 2000);
				$mConfig->insert($Every5Minutes);
			}
			
			$GuestVisit 			= $mConfig->findByName("GUEST_VISIT");
			if ($GuestVisit==null){
				$GuestVisit = new \MVC\Domain\Config(null, 'GUEST_VISIT', 1);
				$mConfig->insert($GuestVisit);
			}
			
			$Discount 				= $mConfig->findByName("DISCOUNT");
			if ($Discount==null){
				$Discount = new \MVC\Domain\Config(null, 'DISCOUNT', 0);
				$mConfig->insert($Discount);
			}
			
			$CategoryAuto 			= $mConfig->findByName("CATEGORY_AUTO");
			if ($CategoryAuto==null){
				$CategoryAuto = new \MVC\Domain\Config(null, 'CATEGORY_AUTO', $CategoryAll->current()->getId());
				$mConfig->insert($CategoryAuto);
			}
			
			$SwitchBoardCall		= $mConfig->findByName("SWITCH_BOARD_CALL");
			if ($SwitchBoardCall==null){
				$SwitchBoardCall = new \MVC\Domain\Config(null, 'SWITCH_BOARD_CALL', 1);
				$mConfig->insert($SwitchBoardCall);
			}
			
			$ReceiptVirtualDouble	= $mConfig->findByName("RECEIPT_VIRTUAL_DOUBLE");
			if ($ReceiptVirtualDouble==null){
				$ReceiptVirtualDouble = new \MVC\Domain\Config(null, 'RECEIPT_VIRTUAL_DOUBLE', 1);
				$mConfig->insert($ReceiptVirtualDouble);
			}
			
			$nMonthLog				= $mConfig->findByName("N_MONTH_LOG");
			if ($nMonthLog==null){
				$nMonthLog = new \MVC\Domain\Config(null, 'N_MONTH_LOG', 1);
				$mConfig->insert($nMonthLog);
			}
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty('Title', 				$Title);
			$request->setProperty('ActiveAdmin', 		'Config');
			$request->setObject('Navigation', 			$Navigation);
			$request->setObject('CategoryAll', 			$CategoryAll);
			
			$request->setObject('RowPerPage', 			$RowPerPage);
			$request->setObject('Every5Minutes', 		$Every5Minutes);
			$request->setObject('GuestVisit', 			$GuestVisit);
			$request->setObject('Discount', 			$Discount);
			$request->setObject('CategoryAuto', 		$CategoryAuto);
			$request->setObject('SwitchBoardCall', 		$SwitchBoardCall);
			$request->setObject('ReceiptVirtualDouble', $ReceiptVirtualDouble);
			$request->setObject('nMonthLog', 			$nMonthLog);
												
			return self::statuses('CMD_DEFAULT');
		}
	}
?>