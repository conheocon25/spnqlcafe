<?php	
	namespace MVC\Command;
	class SettingCategoryCourseRecipeInsExe extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCourse = $request->getProperty("IdCourse");
			$IdResource = $request->getProperty("IdResource");
			$Value1 = $request->getProperty("Value1");
			$Value2 = $request->getProperty("Value2");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mR2C = new \MVC\Mapper\R2C();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Recipe = new \MVC\Domain\R2C(
				null,
				$IdCourse,
				$IdResource,
				$Value1,
				$Value2
			);			
			$mR2C->insert($Recipe);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>