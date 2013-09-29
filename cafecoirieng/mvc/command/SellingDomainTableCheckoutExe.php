<?php
	namespace MVC\Command;
	class SellingDomainTableCheckoutExe extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdTable = $request->getProperty("IdTable");
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mTable = new \MVC\Mapper\Table();
			$mTableLog = new \MVC\Mapper\TableLog();
			$mCourse = new \MVC\Mapper\Course();
			$mSession = new \MVC\Mapper\Session();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Table = $mTable->find($IdTable);
			$Session = $Table->getSessionActive();			
			
			//Thanh toán đủ
			if (isset($Session)){
				$Session->setStatus(1);
				$Session->setValue( $Session->getReValue() );
				$mSession->update($Session);
				
				$Log = new \MVC\Domain\TableLog(
					null,
					@\MVC\Base\SessionRegistry::getCurrentIdUser(),
					$IdTable,
					date('Y-m-d H:i:s'),
					"Khách tính tiền"
				);
				$mTableLog->insert($Log);
			}
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
			return self::statuses('CMD_OK');
		}
	}
?>