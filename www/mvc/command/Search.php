<?php
	namespace MVC\Command;	
	use MVC\Library\Captcha;
	class Search extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$SearchNameStore = $request->getProperty('SearchNameStore');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mStore 	= new \MVC\Mapper\Store();
			$mProvince 	= new \MVC\Mapper\Province();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Title = "HỆ THỐNG QUẢN LÝ CAFE";
			if (!isset($SearchNameStore)) $SearchNameStore="";
			
			$StoreAll = $mStore->searchByName(array("%".$SearchNameStore."%"));
			$ProvinceAll = $mProvince->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------								
			$request->setProperty("Title", $Title);
			$request->setObject("StoreAll", $StoreAll);
			$request->setObject("ProvinceAll", $ProvinceAll);			
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>