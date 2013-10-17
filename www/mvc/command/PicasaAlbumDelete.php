<?php
	namespace MVC\Command;	
	class PicasaAlbumDelete extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");	
			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();

			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------			
			$IdStore = $request->getProperty('IdStore');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mConfig 	= new \MVC\Mapper\Config();
			$mStore 	= new \MVC\Mapper\Store();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$PicasaUser 	= $mConfig->findByName("PICASA_USER");
			$PicasaPassword = $mConfig->findByName("PICASA_PASSWORD");
			$Store 			= $mStore->find($IdStore);
			
			$P = new \MVC\Library\Picasa();
			$P->login($PicasaUser->getValue(), $PicasaPassword->getValue());
			$P->deleteAlbum( $Store->getIdPicasaAlbum() );
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			echo "OK";
		}
	}
?>