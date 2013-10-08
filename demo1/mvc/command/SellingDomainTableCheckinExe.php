<?php
	namespace MVC\Command;
	class SellingDomainTableCheckinExe extends Command{
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
			$mTable 	= new \MVC\Mapper\Table();
			$mCourse 	= new \MVC\Mapper\Course();
			$mSession 	= new \MVC\Mapper\Session();
			$mConfig 	= new \MVC\Mapper\Config();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Table = $mTable->find($IdTable);
									
			//Nếu chưa có Session thì tạo
			$SessionTable = $Table->getSessionActive();	
			$IdUser = $Session->getCurrentIdUser();
			$Config = $mConfig->findByName("DISCOUNT");
			
			if (!isset($SessionTable)){				
				$dSession = new \MVC\Domain\Session(
					null,					//Id
					$IdTable,				//IdTable
					$IdUser ,				//IdUser
					1,						//IdCustomer
					\date("Y-m-d H:i:s"), 	//DateTime
					null, 					//DateTimeEnd
					"",						//Note
					0,						//Status
					0,						//Discount Value
					isset($Config)?$Config->getValue():0,		//Discount Percent
					0,						//Surtax
					0,						//Payment
					0						//Value
				);
				$IdSession = $mSession->insert($dSession);
			}
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>