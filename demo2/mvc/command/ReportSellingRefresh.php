<?php		
	namespace MVC\Command;	
	class ReportSellingRefresh extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			
			$IdTrack = $request->getProperty('IdTrack');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mTracking = new \MVC\Mapper\Tracking();
			$mSession = new \MVC\Mapper\Session();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Track = $mTracking->find($IdTrack);
			$SessionAll = $Track->getSessionAll();
			while($SessionAll->valid()){
				$Session = $SessionAll->current();
				$Value = $Session->getReValue();
				$Session->setValue($Value);
				$mSession->update($Session);
				$SessionAll->next();
			}
			
			$Title = "LÀM TƯƠI LẠI DỮ LIỆU";			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setProperty('Title', $Title);
			$request->setProperty('URLHeader', "/app");
			$request->setObject('Track', $Track);
		}
	}
?>