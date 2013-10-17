<?php
	namespace MVC\Command;	
	class PicasaImageDelete extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");	
			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();

			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------			
			$IdImage = $request->getProperty('IdImage');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mConfig 	= new \MVC\Mapper\Config();
			$mStore 	= new \MVC\Mapper\Store();
			$mImage 	= new \MVC\Mapper\Image();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Image = $mImage->find($IdImage);
			$Store = $Image->getAlbum()->getStore();
			
			$PicasaUser 	= $mConfig->findByName("PICASA_USER");
			$PicasaPassword = $mConfig->findByName("PICASA_PASSWORD");
			
			$P = new \MVC\Library\Picasa();
			$P->login($PicasaUser->getValue(), $PicasaPassword->getValue());
			$P->deletePhoto( $Store->getIdPicasaAlbum(), $Image->getKey() );
			
			$mImage->delete(array($IdImage));
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			echo "OK";
		}
	}
?>