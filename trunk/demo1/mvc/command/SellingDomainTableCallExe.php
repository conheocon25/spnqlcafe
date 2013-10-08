<?php
	namespace MVC\Command;
	class SellingDomainTableCallExe extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session_Sys = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdTable 	= $request->getProperty("IdTable");			
			$IdCourse 	= $request->getProperty("IdCourse");
			$Count 		= $request->getProperty("Count");
			$Price 		= $request->getProperty("Price");
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mTable 	= new \MVC\Mapper\Table();
			$mSD 		= new \MVC\Mapper\SessionDetail();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Table = $mTable->find($IdTable);
			$IdSession = $Table->getSessionActive()->getId();
			
			//Kiểm tra xem IdCourse đã có tồn tại trong Session hiện tại chưa
			$IdSD = $mSD->check(array($IdSession, $IdCourse));
			if (!isset($IdSD) || $IdSD==null){
				$SD = new \MVC\Domain\SessionDetail(
					null,
					$IdSession, 
					$IdCourse, 
					$Count,
					$Price
				);
				$mSD->insert($SD);
			}else{
				$SD = $mSD->find($IdSD);
				$SD->setCount($Count);				
				$SD->setPrice($Price);
				$mSD->update($SD);
			}
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("SD", $SD);
		}
	}
?>