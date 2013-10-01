<?php	
	namespace MVC\Command;
	class SettingCategoryCourseUpdExe extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------			
			$IdCourse = $request->getProperty("IdCourse");
			$Name = $request->getProperty("Name2");
			$ShortName = $request->getProperty("ShortName2");
			$Unit = $request->getProperty("Unit2");
			$Price1 = $request->getProperty("Price1_2");
			$Price2 = $request->getProperty("Price2_2");
			$Price3 = $request->getProperty("Price3_2");
			$Price4 = $request->getProperty("Price4_2");
			$Rate = $request->getProperty("Rate2");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCourse = new \MVC\Mapper\Course();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Course = $mCourse->find($IdCourse);
			if (!isset($Name) || !isset($Price1) || !isset($Unit) )
				return self::statuses('CMD_OK');
							
			$Course->setName($Name);
			$Course->setShortName($ShortName);
			$Course->setUnit($Unit);
			$Course->setPrice1($Price1);
			$Course->setPrice2($Price2);
			$Course->setPrice3($Price3);
			$Course->setPrice4($Price4);
			$Course->setRate($Rate);
			
			$mCourse->update($Course);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>