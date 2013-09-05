<?php
	namespace MVC\Command;
	class SettingCategoryCourseRecipeDelLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCategory = $request->getProperty("IdCategory");
			$IdCourse = $request->getProperty("IdCourse");
			$IdRecipe = $request->getProperty("IdRecipe");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCategory = new \MVC\Mapper\Category();
			$mCourse = new \MVC\Mapper\Course();
			$mR2C = new \MVC\Mapper\R2C();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Course = $mCourse->find($IdCourse);
			$Category = $mCategory->find($IdCategory);
			$Recipe = $mR2C->find($IdRecipe);
			$Title = mb_strtoupper("THIẾT LẬP / ".$Category->getName()." / ".$Course->getName()." / ÁNH XẠ / XÓA", 'UTF8');
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("Course", $Course);
			$request->setObject("Recipe", $Recipe);
			
			$request->setProperty( "Title", $Title );
			$request->setProperty( "URLHeader", $Course->getURLRecipe() );
			
		}
	}
?>