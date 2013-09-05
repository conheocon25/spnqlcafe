<?php	
	namespace MVC\Command;
	class SettingCategoryCourseRecipeUpdExe extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdRecipe = $request->getProperty("IdRecipe");
			$Value1 = $request->getProperty("Value1");
			$Value2 = $request->getProperty("Value2");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mR2C = new \MVC\Mapper\R2C();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Recipe = $mR2C->find($IdRecipe);										
			$Recipe->setValue1($Value1);
			$Recipe->setValue2($Value2);
			$mR2C->update($Recipe);
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>