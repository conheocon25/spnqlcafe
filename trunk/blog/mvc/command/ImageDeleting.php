<?php
	namespace MVC\Command;	
	class ImageDeleting extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");	
			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();

			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdAlbum = $request->getProperty('IdAlbum');
			$IdImage = $request->getProperty('IdImage');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mBAlbum = new \MVC\Mapper\BAlbum();
			$mBImage = new \MVC\Mapper\BImage();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$P = new \MVC\Library\Picasa();
			$Image = $mBImage->find($IdImage);						
			$P->login('picasavinhlong@gmail.com', 'admin123456789');
			$Id = "5933065650085126945";			
			$P->deletePhoto($Id, $Image->getKey() );			
			$mBImage->delete(array($IdImage));
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
						
		}
	}
?>