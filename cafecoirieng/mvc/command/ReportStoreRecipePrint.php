<?php		
	namespace MVC\Command;	
	class ReportStoreRecipePrint extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------									
			$mSupplier = new \MVC\Mapper\Supplier();
			$mCategory = new \MVC\Mapper\Category();
			$mR2C = new \MVC\Mapper\R2C();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Title = "CÔNG THỨC QUI ĐỔI";
			$CategoryAll = $mCategory->findAll();
						
			while ($CategoryAll->valid()){
				$Data = array();
																	
				$Category = $CategoryAll->current();												
				$CourseAll = $Category->getCourses();
				$Data[] = $Category->getName();
				$R = array();
				while ($CourseAll->valid()){
					$Course = $CourseAll->current();										
					
					//Danh sách phân phối
					$R1 = array();
					$RecipeAll = $mR2C->findBy(array($Course->getId()));
					while ($RecipeAll->valid()){
						$Recipe = $RecipeAll->current();
						$R1[] = array(
							$Recipe->getResource()->getName(), 
							$Recipe->getValue1(),
							$Course->getUnit(),
							$Recipe->getValue2(),
							$Recipe->getResource()->getUnit(), 
						);
						$RecipeAll->next();
					}					
					$R[] = array($Course->getName(), $Course->getUnit(), $R1);
					$CourseAll->next();
				}
				$Data[] = $R;
				
				$DataAll[] = $Data;
				$CategoryAll->next();				
			}
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setProperty('Title', $Title);
			$request->setObject('DataAll', $DataAll);
		}
	}
?>