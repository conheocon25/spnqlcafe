<?php
	namespace MVC\Command;
	class SettingCategoryCourseInsExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------			
			$IdCategory = $request->getProperty('IdCategory');
			$Name = $request->getProperty('Name1');
			$ShortName = $request->getProperty('ShortName1');
			$Unit = $request->getProperty('Unit1');
			$Price1 = $request->getProperty('Price1_1');
			$Price2 = $request->getProperty('Price2_1');
			$Price3 = $request->getProperty('Price3_1');
			$Price4 = $request->getProperty('Price4_1');
			$Rate = $request->getProperty('Rate1');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCourse = new \MVC\Mapper\Course();								
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------										
			$Course = new \MVC\Domain\Course(
					null,
					$IdCategory,
					$Name,
					$ShortName,
					$Unit,
					$Price1,
					0,
					0,
					0,
					"",
					$Rate
			);
			$mCourse->Insert($Course);
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
			
		}
	}
?>
